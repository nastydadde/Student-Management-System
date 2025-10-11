@extends('layouts.app')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="p-6">
  <h1 class="text-2xl font-bold text-black mb-4">Generate Student Report</h1>

  <form method="GET" action="{{ route('admin.report') }}" class="mb-6 flex flex-wrap items-center gap-4">
    <input type="text" name="search" value="{{ request('search') }}"
      placeholder="Search by name or enrollment"
      class="w-full md:w-1/3 px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50" />

    <select name="department"
      class="w-full md:w-1/4 px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50">
      <option value="">All Departments</option>
      @foreach($departments as $dept)
      <option value="{{ $dept }}" {{ request('department') == $dept ? 'selected' : '' }}>
        {{ $dept }}
      </option>
      @endforeach
    </select>

    <select name="school"
      class="w-full md:w-1/4 px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50">
      <option value="">All Schools</option>
      @foreach($schools as $sch)
      <option value="{{ $sch }}" {{ request('school') == $sch ? 'selected' : '' }}>
        {{ $sch }}
      </option>
      @endforeach
    </select>

    <select name="semester"
      class="w-full md:w-1/6 px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50">
      <option value="">All Semesters</option>
      @for ($i = 1; $i <= 8; $i++)
        <option value="{{ $i }}" {{ request('semester') == $i ? 'selected' : '' }}>
        Semester {{ $i }}
        </option>
        @endfor
    </select>

    <!-- Division Filter -->
    <select name="division"
      class="w-full md:w-1/6 px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50">
      <option value="">All Divisions</option>
      @foreach(range('A', 'J') as $div)
      <option value="{{ $div }}" {{ request('division') == $div ? 'selected' : '' }}>
        Division {{ $div }}
      </option>
      @endforeach
    </select>

    <button type="submit"
      class="px-6 py-2 bg-[#ca2125] text-white rounded-lg hover:bg-[#ff0000] transition-colors">
      Search
    </button>
  </form>

  @if (Auth::user()->role === 'super_admin')
  @if ($students->count())
  <form method="POST" action="{{ route('admin.report.generateAll') }}" class="mb-6">
    @csrf

    <!-- Preserve filter values -->
    <input type="hidden" name="search" value="{{ request('search') }}">
    <input type="hidden" name="department" value="{{ request('department') }}">
    <input type="hidden" name="school" value="{{ request('school') }}">
    <input type="hidden" name="semester" value="{{ request('semester') }}">
    <input type="hidden" name="division" value="{{ request('division') }}">

    <!-- Section checkboxes -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-4 text-sm">
      <label class="flex items-center gap-2">
        <input type="checkbox" name="sections[]" value="basic" checked>
        Basic Info
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="sections[]" value="contact" checked>
        Contact
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="sections[]" value="followups" checked>
        Follow-Ups
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="sections[]" value="attendance" checked>
        Attendance
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="sections[]" value="results" checked>
        Results
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="sections[]" value="summary" checked>
        Summary
      </label>
    </div>

    <button type="submit" class="px-6 py-2 bg-[#ca2125] text-white rounded-lg hover:bg-[#ff0000] transition-colors">
      Download All Reports (ZIP)
    </button>
  </form>
  @endif
  @endif


  @if ($students->count())
  <table class="min-w-full bg-white border border-gray-500 mt-6 rounded-lg">
    <thead class="bg-[#ca2125] text-white">
      <tr>
        <th class="px-6 py-3 text-left">Name</th>
        <th class="px-6 py-3 text-left">Enrollment No.</th>
        <th class="px-6 py-3 text-left">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
      <tr class="border-t border-gray-500 hover:bg-[#fcfcfc]">
        <td class="px-6 py-4 text-black">{{ $student->name }}</td>
        <td class="px-6 py-4">{{ $student->enrollment_no }}</td>
        <td class="px-6 py-4">
          <!-- @if (Auth::user()->role === 'super_admin')
          <button onclick="openReportModal({{ $student->id }})" class="bg-[#ca2125] text-white px-4 py-2 rounded hover:bg-[#ff0000] transition-colors">
            Generate
          </button>
          @else
          <p class="text-sm text-gray-500">Only super admins can download reports.</p>
          @endif -->
          <button onclick="openReportModal({{ $student->id }})" class="bg-[#ca2125] text-white px-4 py-2 rounded hover:bg-[#ff0000] transition-colors">
            Generate
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <div class="text-center text-[#777777] mt-10 text-lg">
    No students found for the given search criteria.
  </div>
  @endif
</div>

<!-- Modal -->
<div id="reportModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
  <div class="bg-white rounded-lg p-6 w-full max-w-lg shadow-lg">
    <h2 class="text-lg font-bold text-black mb-4">Select Report Sections</h2>
    <form id="generateReportForm">
      <input type="hidden" name="student_id" id="reportStudentId">
      <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
        <label class="flex items-center gap-2">
          <input type="checkbox" name="sections[]" value="basic" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          Basic Info
        </label>
        <label class="flex items-center gap-2">
          <input type="checkbox" name="sections[]" value="contact" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          Contact
        </label>
        <label class="flex items-center gap-2">
          <input type="checkbox" name="sections[]" value="followups" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          Follow-Ups
        </label>
        <label class="flex items-center gap-2">
          <input type="checkbox" name="sections[]" value="attendance" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          Attendance
        </label>
        <label class="flex items-center gap-2">
          <input type="checkbox" name="sections[]" value="results" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          Results
        </label>
        <label class="flex items-center gap-2">
          <input type="checkbox" name="sections[]" value="summary" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          Summary
        </label>
        <label class="col-span-2 flex items-center gap-2 mt-2">
          <input type="checkbox" id="selectAllSections" class="rounded border-gray-500 text-[#ca2125] focus:ring-[#ca2125]">
          <strong>Select All</strong>
        </label>
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeReportModal()" class="px-4 py-2 bg-[#fcfcfc] rounded hover:bg-[#777777]/10 text-[#777777] transition-colors">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-[#ca2125] text-white rounded hover:bg-[#ff0000] transition-colors">Download</button>
      </div>
    </form>
  </div>
</div>

<div class="mt-4">
    {{ $students->links() }}
  </div>

<script>
  function openReportModal(studentId) {
    document.getElementById('reportStudentId').value = studentId;
    document.getElementById('reportModal').classList.remove('hidden');
  }

  function closeReportModal() {
    document.getElementById('reportModal').classList.add('hidden');
  }

  document.getElementById('generateReportForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const studentId = formData.get('student_id');

    fetch(`{{ route('admin.report.generate') }}`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: formData
      })
      .then(response => {
        if (!response.ok) throw new Error('Failed to download file');
        return response.blob();
      })
      .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = `student_${studentId}_report.pdf`;
        link.click();
        closeReportModal();
      })
      .catch(error => {
        alert("Report generation failed: " + error.message);
      });
  });

  document.getElementById('selectAllSections').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="sections[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
  });
</script>

@endsection
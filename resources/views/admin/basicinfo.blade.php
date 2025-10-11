@extends('layouts.app')

@section('content')
<div class="mt-6 p-6">
  <h2 class="text-2xl font-bold text-black mb-4">Students Basic Info</h2>

  <form method="GET" action="{{ route('admin.basicinfo') }}" class="mb-6 flex flex-wrap items-center gap-4">
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

  @if ($students->count())
  <table class="min-w-full bg-white border border-gray-500 rounded-lg">
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
          <button onclick="viewStudentInfo({{ $student->id }})" class="bg-[#ca2125] text-white px-4 py-2 rounded hover:bg-[#ff0000] transition-colors">View</button>
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

  <div class="mt-4">
    {{ $students->links() }}
  </div>
</div>

<!-- Modal -->
<div id="basicInfoModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
  <div class="bg-white rounded-lg p-6 w-full max-w-2xl relative border border-gray-500">
    <button onclick="closeBasicInfoModal()" class="absolute top-2 right-2 text-[#777777] hover:text-[#ff0000] transition-colors">✕</button>
    <h2 class="text-xl font-bold text-black mb-4">Student Information</h2>
    <div id="studentInfoContent" class="space-y-6 text-sm text-black">
  <!-- Section 1: Basic Info -->
  <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
    <h3 class="text-lg font-semibold text-[#ca2125] mb-3">Basic Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div><span class="font-semibold">Name:</span> <span class="text-gray-800" id="name">-</span></div>
      <div><span class="font-semibold">Enrollment No:</span> <span class="text-gray-800" id="enrollment_no">-</span></div>
      <div><span class="font-semibold">Department:</span> <span class="text-gray-800" id="department">-</span></div>
      <div><span class="font-semibold">Current Semester:</span> <span class="text-gray-800" id="current_semester">-</span></div>
      <div><span class="font-semibold">School:</span> <span class="text-gray-800" id="school">-</span></div>
      <div><span class="font-semibold">DOB:</span> <span class="text-gray-800" id="dob">-</span></div>
      <div><span class="font-semibold">Email:</span> <span class="text-gray-800" id="email">-</span></div>
    </div>
  </div>

  <!-- Section 2: Personal Info -->
  <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
    <h3 class="text-lg font-semibold text-[#ca2125] mb-3">Personal Details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div><span class="font-semibold">Gender:</span> <span class="text-gray-800" id="gender">-</span></div>
      <div><span class="font-semibold">Address:</span> <span class="text-gray-800" id="address">-</span></div>
      <div><span class="font-semibold">Cast:</span> <span class="text-gray-800" id="cast">-</span></div>
      <div><span class="font-semibold">Category:</span> <span class="text-gray-800" id="category">-</span></div>
      <div><span class="font-semibold">Aadhar No:</span> <span class="text-gray-800" id="aadhar_no">-</span></div>
      <div><span class="font-semibold">UID No:</span> <span class="text-gray-800" id="uid_no">-</span></div>
    </div>
  </div>

  <!-- Section 3: Academic & Contact Info -->
  <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
    <h3 class="text-lg font-semibold text-[#ca2125] mb-3">Academic & Contact</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div><span class="font-semibold">HSC School/University:</span> <span class="text-gray-800" id="hsc_school_uni">-</span></div>
      <div><span class="font-semibold">HSC City:</span> <span class="text-gray-800" id="hsc_city">-</span></div>
      <div><span class="font-semibold">ABC ID:</span> <span class="text-gray-800" id="abc_id">-</span></div>
      <div><span class="font-semibold">Student Mobile:</span> <span class="text-gray-800" id="student_mobile">-</span></div>
      <div><span class="font-semibold">Father Mobile:</span> <span class="text-gray-800" id="father_mobile">-</span></div>
    </div>
  </div>
</div>
  </div>
</div>

<script>
  function viewStudentInfo(id) {
    fetch(`basic-info/${id}`)
      .then(res => res.json())
      .then(data => {
        document.getElementById('name').textContent = data.name ?? '-';
        document.getElementById('enrollment_no').textContent = data.enrollment_no ?? '-';
        document.getElementById('department').textContent = data.department ?? '-';
        document.getElementById('current_semester').textContent = data.current_semester ?? '-';
        document.getElementById('school').textContent = data.school ?? '-';
        document.getElementById('dob').textContent = data.dob ?? '-';
        document.getElementById('email').textContent = data.email ?? '-';
        document.getElementById('gender').textContent = data.gender ?? '-';
        document.getElementById('address').textContent = data.address ?? '-';
        document.getElementById('cast').textContent = data.cast ?? '-';
        document.getElementById('category').textContent = data.category ?? '-';
        document.getElementById('aadhar_no').textContent = data.aadhar_no ?? '-';
        document.getElementById('uid_no').textContent = data.uid_no ?? '-';
        document.getElementById('hsc_school_uni').textContent = data.hsc_school_uni ?? '-';
        document.getElementById('hsc_city').textContent = data.hsc_city ?? '-';
        document.getElementById('abc_id').textContent = data.abc_id ?? '-';
        document.getElementById('student_mobile').textContent = data.contact?.student_mobile ?? '-';
        document.getElementById('father_mobile').textContent = data.contact?.father_mobile ?? '-';

        document.getElementById('basicInfoModal').classList.remove('hidden');
      });
  }

  function closeBasicInfoModal() {
    document.getElementById('basicInfoModal').classList.add('hidden');
  }
</script>
@endsection
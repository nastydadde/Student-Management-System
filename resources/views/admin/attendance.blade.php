@extends('layouts.app')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold text-black mb-4">Attendance</h1>

  <!-- Note -->
  <div class="mb-4 text-sm text-[#777777] bg-[#fcfcfc] border border-[#ef6a57] p-3 rounded">
    <strong class="text-[#ca2125]">Note:</strong> Attendance data is view-only here. To make changes, use the <a href="{{ route('admin.students') }}" class="text-[#ca2125] underline hover:text-[#ff0000]">Students</a> section.
  </div>

  <!-- Search Bar -->
  <form method="GET" action="{{ route('admin.attendance') }}" class="mb-6 flex flex-wrap items-center gap-4">
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

  <!-- Attendance Table -->
  <div class="overflow-x-auto">
    @if ($students->count())
    <table class="min-w-full bg-white border border-gray-500 rounded-lg">
      <thead class="bg-[#ca2125] text-white text-sm">
        <tr>
          <th class="text-left px-6 py-3">Name</th>
          <th class="text-left px-6 py-3">Enrollment No.</th>
          @for ($i = 1; $i <= 8; $i++)
            <th class="text-left px-6 py-3">Sem {{ $i }}</th>
          @endfor
          <th class="text-left px-6 py-3">Average</th>
        </tr>
      </thead>
      <tbody class="text-[#777777] text-sm" id="studentTableBody">
        @foreach ($students as $student)
        @php
        $semesters = collect([]);
        for ($i = 1; $i <= 8; $i++) {
          $sem=$student->attendances->firstWhere('semester', $i);
          $semesters->push($sem?->attendance_percent);
        }
        $nonNull = $semesters->filter(fn($v) => $v !== null);
        $average = $nonNull->count() ? round($nonNull->avg(), 1) : 'N/A';
        @endphp
        <tr class="border-t border-gray-500 hover:bg-[#fcfcfc]">
          <td class="px-6 py-4 text-black">{{ $student->name }}</td>
          <td class="px-6 py-4">{{ $student->enrollment_no }}</td>
          @foreach ($semesters as $value)
          <td class="px-6 py-4">
            {{ $value !== null ? $value . '%' : '-' }}
          </td>
          @endforeach
          <td class="px-6 py-4 font-semibold {{ is_numeric($average) ? 'text-[#ca2125]' : '' }}">
            {{ is_numeric($average) ? $average . '%' : $average }}
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


  <div class="mt-4">
    {{ $students->links() }}
  </div>
</div>

<script>
  document.getElementById('searchInput').addEventListener('keyup', function() {
    const query = this.value.toLowerCase();
    const rows = document.querySelectorAll('#studentTableBody tr');

    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  });
</script>
@endsection
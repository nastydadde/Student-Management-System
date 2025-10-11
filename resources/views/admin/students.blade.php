@extends('layouts.app')

@section('content')

<style>
    .swal2-popup {
        border-top: 4px solid #ca2125 !important;
        border-radius: 0.5rem !important;
    }

    .swal2-title {
        color: #ca2125 !important;
        font-size: 1.25rem !important;
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 0.5rem;
    }

    .swal2-html-container {
        text-align: left !important;
        padding: 0 1.5rem !important;
    }

    .swal2-input {
        border: 2px solid #d1d5db !important;
        box-shadow: none !important;
    }

    .swal2-validation-message {
        background: #fee2e2 !important;
        color: #b91c1c !important;
    }
</style>

<div class="p-6">
    <div class="flex flex-wrap justify-between items-center mb-4 gap-4">
        <h1 class="text-2xl font-bold text-black">Students</h1>
        <div class="flex flex-wrap gap-2">
            <!-- Trigger Button -->
            <button onclick="openModal()" class="bg-[#ca2125] text-white px-4 py-2 rounded hover:bg-[#ff0000] transition-colors text-sm">
                Add Student
            </button>
            @php
            $isSuperAdmin = Auth::check() && Auth::user()->role === 'super_admin';
            @endphp
            @if($isSuperAdmin)
            <button onclick="document.getElementById('csvModal').classList.remove('hidden')"
                class="bg-[#ca2125] text-white px-4 py-2 rounded hover:bg-[#ff0000] transition-colors text-sm">
                Import CSV
            </button>

            <form action="{{ route('admin.students.deleteAll') }}" method="POST" id="deleteAllStudentsForm">

                @csrf
                @method('DELETE')
                <button type="submit" class="bg-[#ca2125] text-white px-4 py-2 rounded hover:bg-[#ff0000] transition-colors text-sm">
                    Delete All Students
                </button>

            </form>
            @endif
        </div>
    </div>

    <form method="GET" action="{{ route('admin.students') }}" class="mb-6 flex flex-wrap items-center gap-4">
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

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg w-full max-w-3xl shadow-lg relative overflow-y-auto max-h-[90vh]">
            <h2 class="text-xl font-bold text-black mb-4">Add New Student</h2>

            <form action="{{ route('admin.students.store') }}" method="POST">
                @csrf

                <!-- Basic Details -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Name</label>
                        <input type="text" name="name" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Enrollment No</label>
                        <input type="text" name="enrollment_no" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" required>
                    </div>

                    <div>
                        <label for="department" class="block font-medium mb-1 text-[#777777]">Department</label>
                        <input type="text" name="department" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label for="current_semester" class="block font-medium mb-1 text-[#777777]">Current Semester</label>
                        <select name="current_semester" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                            <option value="">Select Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                    </div>

                    <div>
                        <label for="division" class="block font-medium mb-1 text-[#777777]">Division</label>
                        <select name="division" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                            <option value="">Select Division</option>
                            @foreach (range('A', 'J') as $div)
                            <option value="{{ $div }}">{{ $div }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="school" class="block font-medium mb-1 text-[#777777]">School</label>
                        <input type="text" name="school" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Student Mobile</label>
                        <input type="text" name="student_mobile" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Father Mobile</label>
                        <input type="text" name="father_mobile" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Date of Birth</label>
                        <input type="date" name="dob" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Email</label>
                        <input type="email" name="email" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Gender</label>
                        <select name="gender" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Follow-up Date</label>
                        <input type="date" name="followup" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div class="col-span-2">
                        <label class="block font-medium mb-1 text-[#777777]">Address</label>
                        <textarea name="address" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" rows="2"></textarea>
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Cast</label>
                        <input type="text" name="cast" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Category</label>
                        <input type="text" name="category" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">Aadhar No.</label>
                        <input type="text" name="aadhar_no" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">UID No.</label>
                        <input type="text" name="uid_no" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">HSC School/Uni</label>
                        <input type="text" name="hsc_school_uni" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">HSC City</label>
                        <input type="text" name="hsc_city" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#777777]">ABC ID</label>
                        <input type="text" name="abc_id" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                    </div>
                </div>

                <!-- Attendance -->
                <div class="mt-6">
                    <h3 class="font-semibold text-lg mb-2 text-black">Attendance (Semester 1-8)</h3>
                    <div class="grid grid-cols-4 gap-4">
                        @for ($i = 1; $i <= 8; $i++)
                            <div>
                            <label class="block mb-1 text-[#777777]">Sem {{ $i }}</label>
                            <input type="number" name="attendance_{{ $i }}" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" min="0" max="100">
                    </div>
                    @endfor
                </div>
        </div>

        <!-- Results -->
        <div class="mt-6">
            <h3 class="font-semibold text-lg mb-2 text-black">Results (Semester 1-8)</h3>
            <div class="grid grid-cols-4 gap-4">
                @for ($i = 1; $i <= 8; $i++)
                    <div>
                    <label class="block mb-1 text-[#777777]">Sem {{ $i }}</label>
                    <input type="text" name="result_{{ $i }}" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
            </div>
            @endfor
        </div>
    </div>

    <!-- Backlogs -->
    <div class="mt-6">
        <h3 class="font-semibold text-lg mb-2 text-black">Backlogs (Semester 1-8)</h3>
        <div class="grid grid-cols-4 gap-4">
            @for ($i = 1; $i <= 8; $i++)
                <div>
                <label class="block mb-1 text-[#777777]">Sem {{ $i }}</label>
                <input type="number" name="backlog_{{ $i }}" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" min="0">
        </div>
        @endfor
    </div>

    <br>
    <div>
        <label class="font-semibold text-lg mb-2 text-black">CGPA</label>
        <input type="text" name="cgpa" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
    </div>
</div>

<!-- Actions -->
<div class="mt-6 flex justify-end gap-2">
    <button type="button" onclick="closeModal()" class="px-4 py-2 rounded bg-[#fcfcfc] hover:bg-[#777777]/10 text-[#777777] transition-colors">Cancel</button>
    <button type="submit" class="px-4 py-2 rounded bg-[#ca2125] text-white hover:bg-[#ff0000] transition-colors">Save</button>
</div>
</form>

<!-- Close Button -->
<button onclick="closeModal()" class="absolute top-2 right-2 text-[#777777] hover:text-[#ff0000] text-2xl transition-colors">&times;</button>
</div>
</div>

<!-- Import CSV Modal -->
<div id="csvModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg relative">
        <h2 class="text-xl font-bold text-black mb-4">Import Students via CSV</h2>

        <div class="mb-4 p-3 border border-red-300 bg-red-50 rounded-lg">
            <p class="text-red-700 text-sm font-medium">
                ⚠️ <span class="font-semibold">Important:</span> The system does not support overwriting existing entries.
                Duplicate records will be skipped during import.
            </p>
        </div>

        <form id="csvImportForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-medium mb-1 text-[#777777]">CSV File</label>
                <input type="file" name="csv_file" id="csvFile" accept=".csv" required
                    class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                <p class="text-xs text-gray-500 mt-1">Only .csv files are accepted</p>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('csvModal').classList.add('hidden')"
                    class="px-4 py-2 bg-[#fcfcfc] rounded hover:bg-[#777777]/10 text-[#777777] transition-colors">
                    Cancel
                </button>
                <button type="submit" id="importSubmitBtn"
                    class="px-4 py-2 bg-[#ca2125] text-white rounded hover:bg-[#ff0000] transition-colors">
                    Import
                </button>
            </div>
        </form>

        <button onclick="document.getElementById('csvModal').classList.add('hidden')"
            class="absolute top-2 right-2 text-[#777777] hover:text-[#ff0000] text-xl transition-colors">
            &times;
        </button>
    </div>
</div>

<!-- Add SweetAlert2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('csvImportForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById('importSubmitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Importing...';

        const formData = new FormData(this);

        fetch("{{ route('admin.students.import') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw err;
                    });
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('csvModal').classList.add('hidden');
                Swal.fire({
                    icon: 'success',
                    title: 'Import Successful',
                    text: data.message || 'Students imported successfully!',
                    confirmButtonColor: '#ca2125'
                }).then(() => {
                    location.reload(); 
                });
            })
            .catch(error => {
                let errorMessage = 'An error occurred during import';
                if (error.message) {
                    errorMessage = error.message;
                } else if (error.errors && error.errors.csv_file) {
                    errorMessage = error.errors.csv_file[0];
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Import Failed',
                    html: errorMessage,
                    confirmButtonColor: '#ca2125'
                });
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Import';
                document.getElementById('csvFile').value = '';
            });
    });
</script>
<!-- Students Table -->
<div class="overflow-x-auto mt-4">
    @if ($students->count())
    <table class="min-w-full bg-white border border-gray-500 rounded-lg text-sm text-center">
        <thead class="bg-[#ca2125] text-white">
            <tr>
                <th class="px-4 py-3">Sr No</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Enrollment</th>
                <th class="px-4 py-3">Mobile</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr class="border-t border-gray-500 hover:bg-[#fcfcfc]">
                <td class="px-4 py-3">{{ $student->sr_no }}</td>
                <td class="px-4 py-3 text-black">{{ $student->name }}</td>
                <td class="px-4 py-3">{{ $student->enrollment_no }}</td>
                <td class="px-4 py-3">
                    {{ $student->contact->student_mobile ?? 'N/A' }}
                </td>
                <td class="px-4 py-3">
                    <div class="flex justify-center items-center gap-2">
                        <button
                            onclick="openEditModal({{ $student->id }})"
                            class="bg-[#ca2125] text-white px-3 py-1 rounded hover:bg-[#ff0000] transition-colors text-sm">
                            Edit
                        </button>
                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="delete-student-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#777777] text-white px-3 py-1 rounded hover:bg-[#ff0000] transition-colors text-sm">Delete</button>
                        </form>
                    </div>
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

<!-- Edit Student Modal -->
<div id="editStudentModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-4xl shadow-lg relative overflow-y-auto max-h-[90vh]">
        <h2 class="text-xl font-bold text-black mb-4">Edit Student</h2>

        <form id="editStudentForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_student_id" name="id">

            <!-- Basic Details -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Name</label>
                    <input type="text" name="name" id="edit_name" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" required>
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Enrollment No</label>
                    <input type="text" name="enrollment_no" id="edit_enrollment_no" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" required>
                </div>

                <!-- Department -->
                <div class="mb-4">
                    <label for="edit_department" class="block font-medium mb-1 text-[#777777]">Department</label>
                    <input type="text" id="edit_department" name="department" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" />
                </div>

                <div class="mb-4">
                    <label for="edit_current_semester" class="block font-medium mb-1 text-[#777777]">Current Semester</label>
                    <select id="edit_current_semester" name="current_semester" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                        <option value="">Select Semester</option>
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <div class="mb-4">
                    <label for="edit_division" class="block font-medium mb-1 text-[#777777]">Division</label>
                    <select id="edit_division" name="division" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                        <option value="">Select Division</option>
                        @foreach (range('A', 'J') as $div)
                        <option value="{{ $div }}">{{ $div }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- School -->
                <div class="mb-4">
                    <label for="edit_school" class="block font-medium mb-1 text-[#777777]">School</label>
                    <input type="text" id="edit_school" name="school" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" />
                </div>


                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Student Mobile</label>
                    <input type="text" name="student_mobile" id="edit_student_mobile" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Father Mobile</label>
                    <input type="text" name="father_mobile" id="edit_father_mobile" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Date of Birth</label>
                    <input type="date" name="dob" id="edit_dob" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Email</label>
                    <input type="email" name="email" id="edit_email" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Gender</label>
                    <select name="gender" id="edit_gender" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Follow-up Date</label>
                    <input type="date" name="followup" id="edit_followup" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div class="col-span-2">
                    <label class="block font-medium mb-1 text-[#777777]">Address</label>
                    <textarea name="address" id="edit_address" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" rows="2"></textarea>
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Cast</label>
                    <input type="text" name="cast" id="edit_cast" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Category</label>
                    <input type="text" name="category" id="edit_category" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Aadhar No.</label>
                    <input type="text" name="aadhar_no" id="edit_aadhar_no" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">UID No.</label>
                    <input type="text" name="uid_no" id="edit_uid_no" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">HSC School/Uni</label>
                    <input type="text" name="hsc_school_uni" id="edit_hsc_school_uni" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>
                <div>
                    <label class="block font-medium mb-1 text-[#777777]">HSC City</label>
                    <input type="text" name="hsc_city" id="edit_hsc_city" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">ABC ID</label>
                    <input type="text" name="abc_id" id="edit_abc_id" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">Total Backlogs</label>
                    <input type="number" name="total_backlogs" id="edit_total_backlogs" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" min="0">
                </div>

                <div>
                    <label class="block font-medium mb-1 text-[#777777]">CGPA</label>
                    <input type="number" name="cgpa" id="edit_cgpa" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" step="0.01" min="0">
                </div>
            </div>

            <!-- Attendance -->
            <div class="mt-6">
                <h3 class="font-semibold text-lg mb-2 text-black">Attendance (Semester 1-8)</h3>
                <div class="grid grid-cols-4 gap-4">
                    @for ($i = 1; $i <= 8; $i++)
                        <div>
                        <label class="block mb-1 text-[#777777]">Sem {{ $i }}</label>
                        <input type="number" name="attendance_{{ $i }}" id="edit_attendance_{{ $i }}" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" min="0" max="100">
                </div>
                @endfor
            </div>
    </div>

    <!-- Results -->
    <div class="mt-6">
        <h3 class="font-semibold text-lg mb-2 text-black">Results (SGPA & Backlogs)</h3>
        <div class="grid grid-cols-4 gap-4">
            @for ($i = 1; $i <= 8; $i++)
                <div>
                <label class="block mb-1 text-[#777777]">Sem {{ $i }} SGPA</label>
                <input type="number" name="result_{{ $i }}" id="edit_result_{{ $i }}" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" step="0.01" min="0">
        </div>
        <div>
            <label class="block mb-1 text-[#777777]">Sem {{ $i }} Backlogs</label>
            <input type="number" name="backlog_{{ $i }}" id="edit_backlog_{{ $i }}" class="w-full border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50" min="0">
        </div>
        @endfor
    </div>
</div>

<!-- Actions -->
<div class="mt-6 flex justify-end gap-2">
    <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded bg-[#fcfcfc] hover:bg-[#777777]/10 text-[#777777] transition-colors">Cancel</button>
    <button type="submit" class="px-4 py-2 rounded bg-[#ca2125] text-white hover:bg-[#ff0000] transition-colors">Update</button>
</div>
</form>

<!-- Close Button -->
<button onclick="closeEditModal()" class="absolute top-2 right-2 text-[#777777] hover:text-[#ff0000] text-2xl transition-colors">&times;</button>
</div>
</div>
</div>

<div class="mt-4">
    {{ $students->links() }}
  </div>

<script>
    function openEditModal(studentId) {
        fetch(`{{ url('admin/students') }}/${studentId}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Main table fields
                document.getElementById('edit_student_id').value = data.id ?? '';
                document.getElementById('edit_name').value = data.name ?? '';
                document.getElementById('edit_enrollment_no').value = data.enrollment_no ?? '';
                document.getElementById('edit_email').value = data.email ?? '';
                document.getElementById('edit_dob').value = data.dob ?? '';
                document.getElementById('edit_address').value = data.address ?? '';
                document.getElementById('edit_cast').value = data.cast ?? '';
                document.getElementById('edit_category').value = data.category ?? '';
                document.getElementById('edit_aadhar_no').value = data.aadhar_no ?? '';
                document.getElementById('edit_uid_no').value = data.uid_no ?? '';
                document.getElementById('edit_gender').value = data.gender ?? '';
                document.getElementById('edit_hsc_school_uni').value = data.hsc_school_uni ?? '';
                document.getElementById('edit_hsc_city').value = data.hsc_city ?? '';
                document.getElementById('edit_abc_id').value = data.abc_id ?? '';
                document.getElementById('edit_department').value = data.department ?? '';
                document.getElementById('edit_school').value = data.school ?? '';
                document.getElementById('edit_current_semester').value = data.current_semester ?? '';
                document.getElementById('edit_division').value = data.division ?? '';

                // Related: student_contacts
                if (data.contact) {
                    document.getElementById('edit_student_mobile').value = data.contact.student_mobile ?? '';
                    document.getElementById('edit_father_mobile').value = data.contact.father_mobile ?? '';
                } else {
                    document.getElementById('edit_student_mobile').value = '';
                    document.getElementById('edit_father_mobile').value = '';
                }

                // Related: student_followups
                if (data.followup) {
                    document.getElementById('edit_followup').value = data.followup.followup_date ?? '';
                } else {
                    document.getElementById('edit_followup').value = '';
                }

                // Related: student_summaries
                if (data.summary) {
                    document.getElementById('edit_total_backlogs').value = data.summary.total_backlogs ?? 0;
                    document.getElementById('edit_cgpa').value = data.summary.cgpa ?? 0;
                } else {
                    document.getElementById('edit_total_backlogs').value = 0;
                    document.getElementById('edit_cgpa').value = 0;
                }

                // Related: student_attendances (per semester)
                if (Array.isArray(data.attendances)) {
                    for (let i = 1; i <= 6; i++) {
                        const attendance = data.attendances.find(a => a.semester == i);
                        document.getElementById(`edit_attendance_${i}`).value = attendance?.attendance_percent ?? 0;
                    }
                }

                // Related: student_results (per semester)
                if (Array.isArray(data.results)) {
                    for (let i = 1; i <= 6; i++) {
                        const result = data.results.find(r => r.semester == i);
                        document.getElementById(`edit_result_${i}`).value = result?.sgpa ?? '';
                        document.getElementById(`edit_backlog_${i}`).value = result?.backlog_count ?? 0;
                    }
                }

                // Set form action
                const form = document.getElementById('editStudentForm');
                form.action = `{{ url('/admin/students') }}/${studentId}`;
                document.getElementById('editStudentModal').classList.remove('hidden');
            })
            .catch(error => {
                alert("Failed to load student data.");
                console.error(error);
            });
    }

    function closeEditModal() {
        document.getElementById('editStudentModal').classList.add('hidden');
    }
</script>

<script>
    document.getElementById('deleteAllStudentsForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // First confirmation
        Swal.fire({
            title: 'Delete ALL Students?',
            html: `<div class="text-left">
            <p class="mb-3">This will <strong class="text-[#ff0000]">permanently delete</strong> all student records.</p>
            <p class="font-bold">This action cannot be undone!</p>
        </div>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ca2125',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Continue',
            cancelButtonText: 'Cancel',
            background: '#fff',
            backdrop: 'rgba(0,0,0,0.7)'
        }).then((firstResult) => {
            if (firstResult.isConfirmed) {
                // Second confirmation - require typing "DELETE"
                Swal.fire({
                    title: 'Confirm Deletion',
                    html: `<div class="text-left">
                    <p>Type <strong class="text-[#ca2125]">DELETE</strong> to confirm:</p>
                    <input type="text" id="confirmDeleteInput" class="swal2-input mt-2 border-2 border-gray-300 rounded p-2 w-full" placeholder="Type DELETE here">
                </div>`,
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#ca2125',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Delete All',
                    cancelButtonText: 'Cancel',
                    background: '#fff',
                    focusConfirm: false,
                    preConfirm: () => {
                        const inputValue = document.getElementById('confirmDeleteInput').value;
                        if (inputValue !== 'DELETE') {
                            Swal.showValidationMessage('You must type "DELETE" to confirm');
                            return false;
                        }
                        return true;
                    }
                }).then((finalResult) => {
                    if (finalResult.isConfirmed) {
                        // Show loading state
                        const submitBtn = this.querySelector('button[type="submit"]');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = `
                        <span class="inline-flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Deleting All Students...
                        </span>
                    `;
                        submitBtn.disabled = true;

                        // Submit the form
                        this.submit();
                    }
                });
            }
        });
    });

    document.querySelectorAll('.delete-student-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Delete Student?',
                text: "Are you sure you want to delete this student? This action cannot be undone.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#ff0000', // Bright red (matches your hover color)
                cancelButtonColor: '#777777', // Gray (matches your button color)
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel',
                background: '#fff',
                color: '#333',
                customClass: {
                    popup: 'shadow-lg'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>

<!-- Modal Scripts -->
<script>
    function openModal() {
        document.getElementById('addStudentModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('addStudentModal').classList.add('hidden');
    }
</script>
@endsection
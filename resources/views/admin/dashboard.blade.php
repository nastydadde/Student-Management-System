@extends('layouts.app')

@section('content')
<header class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-black">Dashboard Overview</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm bg-[#ca2125] hover:bg-[#ff0000] text-white px-4 py-2 rounded transition-colors">
            Logout
        </button>
    </form>
</header>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mb-10">
    <div class="bg-white p-6 rounded-lg shadow-md border border-[#fcfcfc] hover:shadow-lg transition">
        <h2 class="text-sm text-[#777777] uppercase tracking-wider">Total Students</h2>
        <p class="text-3xl font-bold text-[#ca2125] mt-2">{{ $totalStudents }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border border-[#fcfcfc] hover:shadow-lg transition">
        <h2 class="text-sm text-[#777777] uppercase tracking-wider">Pending Follow Ups</h2>
        <p class="text-3xl font-bold text-[#ff0000] mt-2">{{ $pendingFollowUps }}</p>
    </div>
</div>

<!-- Quick Links -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
    <a href="{{ route('admin.students') }}" class="bg-white p-5 rounded-lg shadow-md border border-[#fcfcfc] hover:border-[#ef6a57] transition-colors group">
        <div class="flex items-center">
            <div class="bg-[#ca2125] p-3 rounded-lg mr-4 group-hover:bg-[#ff0000] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-black">Manage Students</h3>
                <p class="text-sm text-[#777777]">Add, edit or remove students</p>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.export') }}" class="bg-white p-5 rounded-lg shadow-md border border-[#fcfcfc] hover:border-[#ef6a57] transition-colors group">
        <div class="flex items-center">
            <div class="bg-[#ca2125] p-3 rounded-lg mr-4 group-hover:bg-[#ff0000] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-black">Import / Export Data</h3>
                <p class="text-sm text-[#777777]">CSV tools for student records</p>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.attendance') }}" class="bg-white p-5 rounded-lg shadow-md border border-[#fcfcfc] hover:border-[#ef6a57] transition-colors group">
        <div class="flex items-center">
            <div class="bg-[#ca2125] p-3 rounded-lg mr-4 group-hover:bg-[#ff0000] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-black">View Attendance</h3>
                <p class="text-sm text-[#777777]">Track student attendance</p>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.results') }}" class="bg-white p-5 rounded-lg shadow-md border border-[#fcfcfc] hover:border-[#ef6a57] transition-colors group">
        <div class="flex items-center">
            <div class="bg-[#ca2125] p-3 rounded-lg mr-4 group-hover:bg-[#ff0000] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-black">Semester Results</h3>
                <p class="text-sm text-[#777777]">Track and manage results</p>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.followups') }}" class="bg-white p-5 rounded-lg shadow-md border border-[#fcfcfc] hover:border-[#ef6a57] transition-colors group">
        <div class="flex items-center">
            <div class="bg-[#ca2125] p-3 rounded-lg mr-4 group-hover:bg-[#ff0000] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-black">Follow Ups</h3>
                <p class="text-sm text-[#777777]">Check follow-up history</p>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.report') }}" class="bg-white p-5 rounded-lg shadow-md border border-[#fcfcfc] hover:border-[#ef6a57] transition-colors group">
        <div class="flex items-center">
            <div class="bg-[#ca2125] p-3 rounded-lg mr-4 group-hover:bg-[#ff0000] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-black">Download Reports</h3>
                <p class="text-sm text-[#777777]">Generate detailed PDF reports</p>
            </div>
        </div>
    </a>
</div>

<!-- Pending Follow Ups List -->
<div class="mt-10 bg-white p-6 rounded-lg shadow-md border border-[#fcfcfc]">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-[#ca2125]">Recent Pending Follow Ups</h2>
        <span class="bg-[#ff0000] text-white text-xs px-3 py-1 rounded-full">{{ $pendingFollowUpList->count() }} Pending</span>
    </div>

    @if($pendingFollowUpList->isEmpty())
    <p class="text-[#777777]">No pending follow-ups found.</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-[#fcfcfc] text-[#777777] uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Student Name</th>
                    <th class="px-4 py-3 text-left">Enrollment No</th>
                    <th class="px-4 py-3 text-left">Follow Up Date</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#fcfcfc]">
                @foreach ($pendingFollowUpList as $followup)
                <tr class="hover:bg-[#fcfcfc]">
                    <td class="px-4 py-3 text-black">{{ $followup->student->name ?? 'N/A' }}</td>
                    <td class="px-4 py-3 text-[#777777]">{{ $followup->student->enrollment_no ?? 'N/A' }}</td>
                    <td class="px-4 py-3 text-[#777777]">{{ \Carbon\Carbon::parse($followup->followup_date)->format('d M, Y') }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-[#ff0000]/10 text-[#ff0000] text-xs px-2 py-1 rounded-full">Pending</span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex justify-end space-x-3">
                            <button onclick="fetchFollowupData({{ $followup->student_id }}, {{ $followup->id }})"
                                class="text-[#ca2125] hover:text-[#ff0000] transition-colors px-3 py-1 border border-[#ca2125] rounded hover:bg-[#ca2125]/10">
                                Edit
                            </button>
                            <form onsubmit="handleFollowupDelete(event, {{ $followup->id }})" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[#777777] hover:text-[#ff0000] transition-colors px-3 py-1 border border-[#777777] rounded hover:bg-[#777777]/10 hover:border-[#ff0000]">
                                    Delete
                                </button>
                            </form>


                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

<!-- Edit Follow-up Modal -->
<div id="editFollowupModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4 shadow-xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-black">Edit Follow-up</h2>
            <button onclick="closeFollowupModal()" class="text-[#777777] hover:text-[#ff0000]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form onsubmit="submitFollowupEdit(event)">
            <input type="hidden" id="editFollowupId" name="id">

            <div class="mb-4">
                <label for="editFollowupDate" class="block font-medium mb-1 text-[#777777]">Date</label>
                <input type="date" id="editFollowupDate" name="followup_date" class="w-full border border-[#fcfcfc] rounded px-3 py-2 focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50 border-gray-700" required>
            </div>

            <div class="mb-4">
                <label for="editFollowupRemark" class="block font-medium mb-1 text-[#777777]">Remark</label>
                <textarea id="editFollowupRemark" name="remark" class="w-full border border-[#fcfcfc] rounded px-3 py-2 focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50 border-gray-700" rows="3"></textarea>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeFollowupModal()" class="bg-[#fcfcfc] hover:bg-[#777777]/10 text-[#777777] px-4 py-2 rounded transition-colors">Cancel</button>
                <button type="submit" class="bg-[#ca2125] hover:bg-[#ff0000] text-white px-4 py-2 rounded transition-colors">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function handleFollowupDelete(event, id) {
    event.preventDefault();

    const form = event.target;
    const csrfToken = form.querySelector('input[name="_token"]').value;
    const deleteButton = event.target.closest('button') || event.target;

    // Show confirmation dialog
    Swal.fire({
        title: 'Delete Follow-up?',
        html: `<div class="text-left">
            <p>This will permanently delete this follow-up record.</p>
            <p class="text-red-600 font-semibold mt-2">This action cannot be undone!</p>
        </div>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ca2125', // Your red color
        cancelButtonColor: '#777777',  // Your gray color
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        background: '#ffffff',
        focusCancel: true,
        showClass: {
            popup: 'animate__animated animate__fadeIn'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state on button
            const originalContent = deleteButton.innerHTML;
            deleteButton.innerHTML = `
                <span class="inline-flex items-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" 
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Deleting...
                </span>
            `;
            deleteButton.disabled = true;

            // Make the API call
            fetch(`followups/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(res => {
                if (!res.ok) throw new Error(res.statusText || 'Failed to delete');
                
                // Show success message before reload
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Follow-up was successfully deleted.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                    background: '#ffffff'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                console.error('Delete error:', error);
                deleteButton.innerHTML = originalContent;
                deleteButton.disabled = false;
                
                Swal.fire({
                    title: 'Error!',
                    html: `<div class="text-left">
                        <p>Failed to delete follow-up:</p>
                        <p class="text-red-600 mt-2">${error.message || 'Please try again'}</p>
                    </div>`,
                    icon: 'error',
                    confirmButtonColor: '#ca2125',
                    background: '#ffffff'
                });
            });
        }
    });
}

    function fetchFollowupData(studentId, followupId) {
        fetch(`followups/${studentId}`)
            .then(res => res.json())
            .then(data => {
                const followup = data.followups.find(f => f.id == followupId);
                if (!followup) {
                    alert('Follow-up not found.');
                    return;
                }

                openFollowupEditModal(followup.id, followup.followup_date, followup.remark);
            })
            .catch(err => {
                console.error(err);
                alert('Error fetching follow-up data.');
            });
    }

    function formatDateForInput(dateString) {
        // Handles date in format "DD-MM-YYYY" and returns "YYYY-MM-DD"
        const parts = dateString.split("-");
        if (parts.length !== 3) return "";
        return `${parts[2]}-${parts[1]}-${parts[0]}`;
    }

    function openFollowupEditModal(id, date, remark) {
        console.log("Setting date:", date);

        document.getElementById('editFollowupId').value = id;
        document.getElementById('editFollowupDate').value = formatDateForInput(date);
        document.getElementById('editFollowupRemark').value = remark ?? '';
        document.getElementById('editFollowupModal').classList.remove('hidden');
    }

    function closeFollowupModal() {
        document.getElementById('editFollowupModal').classList.add('hidden');
    }

    function submitFollowupEdit(event) {
        event.preventDefault();

        const id = document.getElementById('editFollowupId').value;
        const date = document.getElementById('editFollowupDate').value;
        const remark = document.getElementById('editFollowupRemark').value;

        if (!id || !date) {
            Swal.fire({
                title: 'Missing Information',
                html: 'Please provide all <strong>required fields</strong>.',
                icon: 'warning',
                confirmButtonColor: '#ca2125',
                background: '#ffffff'
            });
            return;
        }

        // Show loading state
        const submitBtn = event.target.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.innerHTML = `
        <span class="inline-flex items-center">
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Saving...
        </span>
    `;
        submitBtn.disabled = true;

        fetch(`followups/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    followup_date: date,
                    remark: remark
                })
            })
            .then(res => {
                if (!res.ok) throw new Error(res.statusText || 'Failed to update follow-up');
                return res.json();
            })
            .then(data => {
                Swal.fire({
                    title: 'Success!',
                    text: 'Follow-up updated successfully.',
                    icon: 'success',
                    confirmButtonColor: '#ca2125',
                    background: '#ffffff',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    closeFollowupModal();
                    location.reload();
                });
            })
            .catch(err => {
                console.error('Update error:', err);
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;

                Swal.fire({
                    title: 'Error!',
                    html: `<div class="text-left">
                <p>An error occurred while updating follow-up:</p>
                <p class="text-red-600 mt-2">${err.message || 'Please try again'}</p>
            </div>`,
                    icon: 'error',
                    confirmButtonColor: '#ca2125',
                    background: '#ffffff'
                });
            });
    }
</script>

@endsection
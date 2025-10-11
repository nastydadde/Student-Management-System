@extends('layouts.app')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold text-black mb-4">Follow-Up Records</h1>

  <form method="GET" action="{{ route('admin.followups') }}" class="mb-6 flex flex-wrap items-center gap-4">
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

  <div class="overflow-x-auto">
    @if ($students->count())
    <table class="min-w-full bg-white border border-gray-500 rounded-lg text-sm">
      <thead class="bg-[#ca2125] text-white">
        <tr>
          <th class="text-left px-4 py-3">Name</th>
          <th class="text-left px-4 py-3">Enrollment No</th>
          <th class="text-left px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($students as $student)
        <tr class="border-t border-gray-500 hover:bg-[#fcfcfc]">
          <td class="px-4 py-3 text-black">{{ $student->name }}</td>
          <td class="px-4 py-3">{{ $student->enrollment_no }}</td>
          <td class="px-4 py-3">
            <button
              onclick="openFollowupModal({{ $student->id }})"
              class="px-3 py-1 bg-[#ca2125] text-white rounded hover:bg-[#ff0000] transition-colors">
              View
            </button>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center py-4 text-[#777777]">No students found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    @else
    <div class="text-center text-[#777777] mt-10 text-lg">
      No students found for the given search criteria.
    </div>
    @endif
  </div>
</div>

<!-- Modal -->
<div id="followupModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
  <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-6 relative overflow-y-auto max-h-[90vh]">
    <h2 class="text-xl font-bold text-black mb-4">Follow-Up History</h2>

    <div class="mb-4">
      <div class="text-[#777777]"><strong>Name:</strong> <span id="followupStudentName" class="text-black"></span></div>
      <div class="text-[#777777]"><strong>Enrollment No:</strong> <span id="followupStudentEnroll" class="text-black"></span></div>
    </div>

    <div id="followupList" class="space-y-3">
      <!-- Follow-up items will be inserted here dynamically -->
    </div>

    <!-- Add follow-up form -->
    <form id="addFollowupForm" class="mt-6">
      @csrf
      <input type="hidden" name="student_id" id="followupStudentId">
      <div class="grid grid-cols-2 gap-4 mb-4">
        <input type="date" name="followup_date" required class="border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
        <input type="text" name="remark" placeholder="Remark" class="border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeFollowupModal()" class="px-4 py-2 bg-[#fcfcfc] rounded hover:bg-[#777777]/10 text-[#777777] transition-colors">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-[#ca2125] text-white rounded hover:bg-[#ff0000] transition-colors">Add Follow-Up</button>
      </div>
    </form>

    <form id="editFollowupForm" class="mt-4 hidden">
      @csrf
      @method('PUT')
      <input type="hidden" id="editFollowupId">
      <div class="grid grid-cols-2 gap-4 mb-4">
        <input type="date" id="editFollowupDate" required class="border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
        <input type="text" id="editRemark" placeholder="Remark" class="border border-gray-500 p-2 rounded focus:border-[#ca2125] focus:ring focus:ring-[#ca2125]/50">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="cancelEdit()" class="px-4 py-2 bg-[#fcfcfc] rounded hover:bg-[#777777]/10 text-[#777777] transition-colors">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-[#ca2125] text-white rounded hover:bg-[#ff0000] transition-colors">Update</button>
      </div>
    </form>

    <!-- Close button -->
    <button onclick="closeFollowupModal()" class="absolute top-2 right-3 text-[#777777] hover:text-[#ff0000] text-2xl transition-colors">&times;</button>
  </div>
</div>

<div class="mt-4">
  {{ $students->links() }}
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Configure global SweetAlert with your theme
  const SwalTheme = Swal.mixin({
    background: '#ffffff',
    color: '#000000',
    confirmButtonColor: '#ca2125',
    cancelButtonColor: '#777777',
    customClass: {
      popup: 'border-t-4 border-[#ca2125]'
    }
  });

  let selectedStudentId = null;

  function openFollowupModal(studentId) {
    selectedStudentId = studentId;

    fetch(`followups/${studentId}`)
      .then(res => res.json())
      .then(data => {
        document.getElementById('followupStudentId').value = data.student.id;
        document.getElementById('followupStudentName').textContent = data.student.name || 'N/A';
        document.getElementById('followupStudentEnroll').textContent = data.student.enrollment_no || 'N/A';

        const listContainer = document.getElementById('followupList');
        listContainer.innerHTML = '';

        if (data.followups.length === 0) {
          listContainer.innerHTML = `<div class="text-[#777777]">No follow-up history available.</div>`;
        } else {
          data.followups.forEach(f => {
            const item = document.createElement('div');
            item.className = 'border border-gray-500 p-3 rounded bg-[#fcfcfc] flex justify-between items-start';
            item.innerHTML = `
                        <div>
                            <div><strong class="text-[#777777]">Date:</strong> <span class="text-black">${f.followup_date}</span></div>
                            <div><strong class="text-[#777777]">Remark:</strong> <span class="text-black">${f.remark || '-'}</span></div>
                            <div class="text-xs mt-1 text-[#ca2125] font-medium">
                                <span class="text-black">Created by:</span> ${f.created_by} <span class="text-black">|</span>
                                <span class="text-black">Last modified by:</span> ${f.updated_by}
                            </div>
                        </div>
                        <div class="mt-2 flex gap-4">
                            <button onclick="editFollowup(${f.id}, '${f.followup_date}', \`${f.remark ?? ''}\`)" class="text-[#ca2125] hover:text-[#ff0000] text-sm transition-colors">Edit</button>
                            <button onclick="deleteFollowup(${f.id}, this)" class="text-[#777777] hover:text-[#ff0000] text-sm transition-colors">Delete</button>
                        </div>
                    `;
            listContainer.appendChild(item);
          });
        }

        document.getElementById('followupModal').classList.remove('hidden');
      })
      .catch(err => {
        console.error('Error loading follow-ups:', err);
        SwalTheme.fire({
          icon: 'error',
          title: 'Error',
          text: 'Failed to load follow-up data',
          timer: 3000
        });
      });
  }

  function formatDateForInput(dateString) {
    const parts = dateString.split("-");
    if (parts.length !== 3) return "";
    return `${parts[2]}-${parts[1]}-${parts[0]}`;
  }

  function editFollowup(id, date, remark) {
    document.getElementById('addFollowupForm').classList.add('hidden');
    document.getElementById('editFollowupForm').classList.remove('hidden');
    document.getElementById('editFollowupId').value = id;
    document.getElementById('editFollowupDate').value = formatDateForInput(date);
    document.getElementById('editRemark').value = remark;
  }

  function cancelEdit() {
    document.getElementById('editFollowupForm').classList.add('hidden');
    document.getElementById('addFollowupForm').classList.remove('hidden');
    document.getElementById('editFollowupId').value = '';
    document.getElementById('editFollowupDate').value = '';
    document.getElementById('editRemark').value = '';
  }

  document.getElementById('editFollowupForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const id = document.getElementById('editFollowupId').value;
    const date = document.getElementById('editFollowupDate').value;
    const remark = document.getElementById('editRemark').value;

    fetch(`followups/${id}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json',
        },
        body: JSON.stringify({
          followup_date: date,
          remark: remark,
        }),
      })
      .then(res => res.json())
      .then(data => {
        SwalTheme.fire({
          icon: 'success',
          title: 'Updated',
          text: 'Follow-up updated successfully',
          timer: 2000
        });
        cancelEdit();
        openFollowupModal(selectedStudentId);
      })
      .catch(error => {
        console.error('Update failed:', error);
        SwalTheme.fire({
          icon: 'error',
          title: 'Error',
          text: 'Failed to update follow-up'
        });
      });
  });

  function closeFollowupModal() {
    document.getElementById('followupModal').classList.add('hidden');
  }

  document.getElementById('addFollowupForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(`followups`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
      })
      .then(res => res.json())
      .then(response => {
        SwalTheme.fire({
          icon: 'success',
          title: 'Created',
          text: 'Follow-up added successfully',
          timer: 2000
        });
        openFollowupModal(formData.get('student_id'));
        form.reset();
      })
      .catch(err => {
        console.error('Error adding follow-up:', err);
        SwalTheme.fire({
          icon: 'error',
          title: 'Error',
          text: 'Failed to add follow-up'
        });
      });
  });

  function deleteFollowup(id, button) {
    SwalTheme.fire({
      title: 'Delete Follow-up?',
      html: `<div class="text-left">
            <p>Are you sure you want to delete this follow-up?</p>
            <p class="font-bold text-[#ca2125]">This action cannot be undone!</p>
        </div>`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        button.innerHTML = `
                <span class="inline-flex items-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Deleting...
                </span>
            `;
        button.disabled = true;

        fetch(`followups/${id}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
              'Accept': 'application/json'
            }
          })
          .then(res => {
            if (!res.ok) throw new Error(res.statusText);
            return res.json();
          })
          .then(() => {
            const element = button.closest('div');
            element.style.transition = 'all 0.3s ease';
            element.style.opacity = '0';
            element.style.height = '0';
            element.style.margin = '0';
            element.style.padding = '0';

            setTimeout(() => {
              element.remove();
              SwalTheme.fire({
                title: 'Deleted!',
                text: 'The follow-up has been removed.',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
              });
            }, 300);
          })
          .catch(err => {
            console.error('Error deleting follow-up:', err);
            button.innerHTML = 'Delete';
            button.disabled = false;
            SwalTheme.fire({
              title: 'Error!',
              text: 'Failed to delete follow-up. Please try again.',
              icon: 'error'
            });
          });
      }
    });
  }
</script>
@endpush
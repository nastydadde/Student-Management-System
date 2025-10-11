@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-black">Manage Admin Users</h1>
        <button onclick="openModal()" class="bg-[#ca2125] text-white px-4 py-2 rounded-lg hover:bg-[#ff0000] transition-colors">
            + Add Admin
        </button>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-6 flex flex-wrap gap-3 items-center">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search by name or email"
            class="px-4 py-2 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 transition-colors" />

        <select name="role"
            class="px-4 py-2 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 transition-colors">
            <option value="">All Roles</option>
            @foreach($roles as $role)
            <option value="{{ $role }}" {{ request('role') == $role ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_', ' ', $role)) }}
            </option>
            @endforeach
        </select>

        <button
            type="submit"
            class="px-4 py-2 bg-[#ca2125] text-white rounded-lg hover:bg-[#ff0000] transition-colors">
            Search
        </button>
    </form>

    @if ($users->count())
    <table class="min-w-full bg-white border border-gray-500 rounded-lg">
        <thead class="bg-[#ca2125] text-white">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Role</th>
                <th class="p-3 text-left">Created At</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t border-gray-500 hover:bg-[#fcfcfc]">
                <td class="p-3 text-black">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3 capitalize">{{ $user->role }}</td>
                <td class="p-3">{{ $user->created_at->format('d M Y') }}</td>
                <td class="p-3 flex gap-2">
                    <button onclick='openEditModal(@json($user))' class="bg-[#ca2125] text-white px-3 py-1 rounded hover:bg-[#ff0000] transition-colors text-sm">Edit</button>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="delete-user-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-[#777777] text-white px-3 py-1 rounded hover:bg-[#ff0000] transition-colors text-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center text-[#777777] mt-10 text-lg">
        No users found for the given search criteria.
    </div>
    @endif
</div>

<!-- Add Admin Modal -->
<div id="userModal" class="fixed inset-0 z-50 bg-black/50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md border border-gray-500">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-black">Add New Admin</h2>
            <button onclick="closeModal()" class="text-[#777777] hover:text-[#ff0000] text-xl transition-colors">&times;</button>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Name</label>
                <input type="text" name="name" class="w-full border border-gray-500 rounded p-2 focus:ring-2 focus:ring-[#ca2125]/50" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-gray-500 rounded p-2 focus:ring-2 focus:ring-[#ca2125]/50" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-500 rounded p-2 focus:ring-2 focus:ring-[#ca2125]/50" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Role</label>
                <select name="role" class="w-full border border-gray-500 rounded p-2 focus:ring-2 focus:ring-[#ca2125]/50" required>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Departments</label>
                <div class="flex flex-wrap gap-3">
                    @foreach (['Electrical', 'Mechanical', 'Computer', 'Civil'] as $dept)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="departments[]" value="{{ $dept }}" class="text-[#ca2125]">
                        <span>{{ $dept }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Semesters</label>
                <div class="flex flex-wrap gap-3">
                    @for ($i = 1; $i <= 8; $i++)
                        <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="semesters[]" value="{{ $i }}" class="text-[#ca2125]">
                        <span>{{ $i }}</span>
                        </label>
                        @endfor
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Divisions</label>
                <div class="flex flex-wrap gap-3">
                    @foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'] as $div)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="divisions[]" value="{{ $div }}" class="text-[#ca2125]">
                        <span>{{ $div }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="w-full bg-[#ca2125] text-white px-4 py-2 rounded-lg hover:bg-[#ff0000] transition-colors">Create</button>
        </form>
    </div>
</div>

<!-- Edit Admin Modal -->
<div id="editAdminModal" class="fixed inset-0 hidden items-center justify-center z-50 bg-black/50 flex justify-center items-center gap-2">
    <div class="bg-white rounded-lg p-6 w-full max-w-md relative border border-gray-500">
        <button onclick="closeEditModal()" class="absolute top-2 right-2 text-[#777777] hover:text-[#ff0000] transition-colors">✖</button>

        <h2 class="text-xl font-bold text-black mb-4">Edit Admin</h2>

        <form id="editAdminForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit-id">

            <div class="mb-4">
                <label class="block text-sm text-[#777777]">Name</label>
                <input type="text" id="edit-name" class="w-full px-3 py-2 border border-gray-500 rounded focus:ring-2 focus:ring-[#ca2125]/50" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777]">Email</label>
                <input type="email" id="edit-email" class="w-full px-3 py-2 border border-gray-500 rounded focus:ring-2 focus:ring-[#ca2125]/50" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777]">Role</label>
                <select id="edit-role" class="w-full px-3 py-2 border border-gray-500 rounded focus:ring-2 focus:ring-[#ca2125]/50">
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777]">Departments</label>
                <div class="flex flex-wrap gap-3" id="edit-departments">
                    @foreach (['Electrical', 'Mechanical', 'Computer', 'Civil'] as $dept)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="departments[]" value="{{ $dept }}" class="edit-dept-checkbox text-[#ca2125]">
                        <span>{{ $dept }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777]">Semesters</label>
                <div class="flex flex-wrap gap-3" id="edit-semesters">
                    @for ($i = 1; $i <= 8; $i++)
                        <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="semesters[]" value="{{ $i }}" class="edit-sem-checkbox text-[#ca2125]">
                        <span>{{ $i }}</span>
                        </label>
                        @endfor
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-[#777777] mb-1">Divisions</label>
                <div class="flex flex-wrap gap-3" id="edit-divisions">
                    @foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'] as $div)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="divisions[]" value="{{ $div }}" class="edit-div-checkbox text-[#ca2125]">
                        <span>{{ $div }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-[#ca2125] text-white px-4 py-2 rounded-lg hover:bg-[#ff0000] transition-colors">Update</button>
        </form>
    </div>
</div>

<script>
    const BASE_URL = "{{ url('admin/users') }}";

    function openEditModal(user) {
        console.log("USER DATA:", user);

        document.getElementById('edit-id').value = user.id;
        document.getElementById('edit-name').value = user.name;
        document.getElementById('edit-email').value = user.email;
        document.getElementById('edit-role').value = user.role;

        // Uncheck all checkboxes first
        document.querySelectorAll('.edit-dept-checkbox').forEach(cb => cb.checked = false);
        document.querySelectorAll('.edit-sem-checkbox').forEach(cb => cb.checked = false);
        document.querySelectorAll('.edit-div-checkbox').forEach(cb => cb.checked = false);

        // Parse JSON strings to arrays if needed
        const departments = typeof user.departments === 'string' ? JSON.parse(user.departments) : user.departments || [];
        const semesters = typeof user.semesters === 'string' ? JSON.parse(user.semesters) : user.semesters || [];
        const divisions = typeof user.divisions === 'string' ? JSON.parse(user.divisions) : user.divisions || [];

        // Pre-check department checkboxes
        departments.forEach(dept => {
            const checkbox = document.querySelector(`.edit-dept-checkbox[value="${String(dept)}"]`);
            if (checkbox) checkbox.checked = true;
        });

        // Pre-check semester checkboxes
        semesters.forEach(sem => {
            const checkbox = document.querySelector(`.edit-sem-checkbox[value="${String(sem)}"]`);
            if (checkbox) checkbox.checked = true;
        });

        divisions.forEach(div => {
            const checkbox = document.querySelector(`.edit-div-checkbox[value="${String(div)}"]`);
            if (checkbox) checkbox.checked = true;
        });

        // Show modal
        document.getElementById('editAdminModal').classList.remove('hidden');
    }


    function closeEditModal() {
        document.getElementById('editAdminModal').classList.add('hidden');
    }

    document.getElementById('editAdminForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const id = document.getElementById('edit-id').value;
        const name = document.getElementById('edit-name').value;
        const email = document.getElementById('edit-email').value;
        const role = document.getElementById('edit-role').value;

        const departments = Array.from(document.querySelectorAll('.edit-dept-checkbox:checked')).map(cb => cb.value);
        const semesters = Array.from(document.querySelectorAll('.edit-sem-checkbox:checked')).map(cb => cb.value);
        const divisions = Array.from(document.querySelectorAll('.edit-div-checkbox:checked')).map(cb => cb.value);

        fetch( `${BASE_URL}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    name,
                    email,
                    role,
                    departments,
                    semesters,
                    divisions
                })
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    return response.json().then(data => {
                        throw data
                    });
                }
            })
            .catch(error => {
                alert(error.message || 'Something went wrong.');
            });
    });

    function openModal() {
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }

    document.querySelectorAll('.delete-user-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Delete User Account?',
                html: `<div class="text-left">
                <p class="mb-2">You are about to delete <strong>${this.closest('tr').querySelector('td:first-child')?.textContent || 'this user'}</strong>'s account.</p>
                <p class="text-red-600 font-semibold">This will permanently remove all user data!</p>
            </div>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff0000', // Your hover red
                cancelButtonColor: '#777777', // Your button gray
                confirmButtonText: 'Delete Account',
                cancelButtonText: 'Keep User',
                background: '#ffffff',
                backdrop: `
                rgba(0,0,0,0.4)
                url("/images/warning-pattern.png")
                left top
                repeat
            `,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = `<span class="inline-block animate-spin">⏳</span> Deleting...`;
                    submitBtn.disabled = true;

                    this.submit();
                }
            });
        });
    });
</script>
@endsection
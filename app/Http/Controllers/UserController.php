<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\NewAdminUserMail;
use Illuminate\Support\Facades\Mail;
use App\Models\AdminPermission;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $authUser = auth()->user();

        $query = User::with('permissions')->whereIn('role', ['admin', 'super_admin']);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->get();

        // Combine all permissions per user
        $users->transform(function ($user) {
            $departments = [];
            $semesters = [];
            $divisions = [];

            foreach ($user->permissions as $permission) {
                if ($permission->department) {
                    $departments[] = $permission->department;
                }
                if ($permission->semester) {
                    $semesters[] = $permission->semester;
                }
                if ($permission->division) {
                    $divisions[] = $permission->division;
                }
            }

            $user->departments = array_values(array_unique($departments));
            $user->semesters = array_values(array_unique($semesters));
            $user->divisions = array_values(array_unique($divisions));

            return $user;
        });

        $roles = User::whereIn('role', ['admin', 'super_admin'])->pluck('role')->unique();

        return view('admin.users', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6',
            'role'       => 'required|in:admin,super_admin',
            'departments' => 'nullable|array',
            'semesters'  => 'nullable|array',
            'divisions' => 'nullable|array',
        ]);

        $defaultPassword = $request->password;

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($defaultPassword),
            'role'     => $request->role,
        ]);

        $departments = $request->input('departments'); // e.g. ['Electrical', 'Mechanical']
        $semesters = $request->input('semesters');     // e.g. ['2', '4', '6']
        $divisions = $request->input('divisions');
        $userId = $user->id;

        if ($user->role === 'admin') {
            foreach ($departments as $department) {
                foreach ($semesters as $semester) {
                    foreach ($divisions as $division) {
                        AdminPermission::create([
                            'user_id' => $userId,
                            'department' => $department,
                            'semester' => $semester,
                            'division' => $division
                        ]);
                    }
                }
            }
        }

        Mail::to($user->email)->send(new NewAdminUserMail($user->name, $user->email, $defaultPassword));

        return redirect()->route('admin.users.index')->with('success', 'Admin user created and mail sent successfully.');
    }

    public function edit(User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:admin,super_admin',
            'departments' => 'nullable|array',
            'semesters' => 'nullable|array',
            'divisions' => 'nullable|array',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;
        $user->save();

        $departments = $request->input('departments'); // e.g. ['Electrical', 'Mechanical']
        $semesters = $request->input('semesters');     // e.g. ['2', '4', '6']
        $divisions = $request->input('divisions');
        $userId = $user->id;

        // Remove old permissions and create a new record
        AdminPermission::where('user_id', $user->id)->delete();

        if ($user->role === 'admin') {
            foreach ($departments as $department) {
                foreach ($semesters as $semester) {
                    foreach ($divisions as $division) {
                        AdminPermission::create([
                            'user_id'   => $userId,
                            'department' => $department,
                            'semester'  => $semester,
                            'division' => $division
                        ]);
                    }
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'User updated successfully.']);
    }

    public function destroy(User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin user deleted successfully.');
    }
}

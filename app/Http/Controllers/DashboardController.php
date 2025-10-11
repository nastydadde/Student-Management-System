<?php

namespace App\Http\Controllers;

use App\Models\AdminPermission;
use App\Models\Student;
use App\Models\StudentFollowup;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'super_admin') {
            // Super admin sees everything
            $totalStudents = Student::count();
        } else {
            // Get all allowed combinations of permissions
            $permissions = $user->permissions()->get(['division', 'department', 'semester']);
    
            $totalStudents = Student::where(function ($query) use ($permissions) {
                foreach ($permissions as $permission) {
                    $query->orWhere(function ($subQuery) use ($permission) {
                        $subQuery->where('division', $permission->division)
                                 ->where('department', $permission->department)
                                 ->where('current_semester', $permission->semester);
                    });
                }
            })->count();
        }
    
        $pendingFollowUps = StudentFollowup::whereNull('remark')->count();
        $pendingFollowUpList = StudentFollowup::with('student')
            ->whereNull('remark')
            ->latest()
            ->get();

        return view('admin.dashboard', compact('totalStudents', 'pendingFollowUps', 'pendingFollowUpList'));
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\AdminPermission;

class BasicInfoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $department = $request->input('department');
        $school = $request->input('school');
        $semester = $request->input('semester');
        $division = $request->input('division');

        $user = auth()->user();
        $isSuperAdmin = $user->role === 'super_admin';

        if ($isSuperAdmin) {
            $students = Student::select('id', 'name', 'enrollment_no')->orderBy('name')
                ->when($search, function ($query, $search) {
                    return $query->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%")
                            ->orWhere('enrollment_no', 'like', "%$search%");
                    });
                })
                ->when($department, function ($query, $department) {
                    return $query->where('department', $department);
                })
                ->when($school, function ($query, $school) {
                    return $query->where('school', $school);
                })
                ->when($semester, function ($query, $semester) {
                    return $query->where('current_semester', $semester);
                })
                ->when($division, fn($query) => $query->where('division', $division))
                ->orderBy('id', 'desc')
                ->paginate(15);

            $departments = Student::select('department')->distinct()->pluck('department');
            $schools = Student::select('school')->distinct()->pluck('school');
            $semesters = Student::select('current_semester')->distinct()->pluck('current_semester');
            $divisions = Student::select('division')->distinct()->pluck('division');

            return view('admin.basicinfo', compact('students', 'search', 'department', 'school', 'departments', 'schools', 'semester', 'semesters', 'division', 'divisions'));
        } else {
            // Fetch allowed departments and semesters from multiple rows
            $permissions = AdminPermission::where('user_id', auth()->id())->get();

            $allowedDepartments = $permissions->pluck('department')->unique()->values()->toArray();
            $allowedSemesters = $permissions->pluck('semester')->unique()->values()->toArray();
            $allowedDivisions = $permissions->pluck('division')->unique()->values()->toArray();

            // Query students with filters and permissions
            $students = Student::with(['contact', 'followups', 'attendances', 'results', 'summary'])
                ->whereIn('department', $allowedDepartments)
                ->whereIn('current_semester', $allowedSemesters)
                ->whereIn('division', $allowedDivisions)
                ->when($search, function ($query) use ($search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('enrollment_no', 'like', "%{$search}%");
                    });
                })
                ->when($department, fn($query) => $query->where('department', $department))
                ->when($school, fn($query) => $query->where('school', $school))
                ->when($semester, fn($query) => $query->where('current_semester', $semester))
                ->when($division, fn($query) => $query->where('division', $division))
                ->orderByDesc('id')
                ->paginate(15)
                ->appends($request->query());

            // Dropdown filters based on permitted values
            $departments = Student::whereIn('department', $allowedDepartments)
                ->select('department')->distinct()->pluck('department');

            $schools = Student::select('school')->distinct()->pluck('school');

            $semesters = Student::whereIn('current_semester', $allowedSemesters)
                ->select('current_semester')->distinct()->pluck('current_semester');

                $divisions = Student::select('division')->distinct()->pluck('division');

            return view('admin.students', compact(
                'students',
                'search',
                'department',
                'school',
                'departments',
                'schools',
                'semester',
                'semesters',
                'division',
                'divisions'
            ));
        }
    }

    public function show($id)
    {
        $student = Student::with('contact')->findOrFail($id);
        return response()->json($student);
    }
}

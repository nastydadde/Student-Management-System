<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentFollowup;
use Illuminate\Http\Request;
use App\Models\AdminPermission;

class FollowupController extends Controller
{
    // Show the main follow-up page with a list of students
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
            $students = Student::select('id', 'name', 'enrollment_no')->when($search, function ($query, $search) {
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

            return view('admin.followups', compact('students', 'search', 'department', 'school', 'departments', 'schools',  'semester', 'semesters', 'division', 'divisions'));
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

            return view('admin.followups', compact(
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

    // Return follow-up history for a student (AJAX)
    public function show(Student $student)
    {
        $followups = $student->followups()
            ->with(['createdByUser', 'updatedByUser']) // Eager-load related users
            ->orderBy('followup_date', 'desc')
            ->get()
            ->map(function ($f) {
                return [
                    'id' => $f->id,
                    'followup_date' => optional($f->followup_date)->format('d-m-Y'),
                    'remark' => $f->remark ?? '',
                    'created_at' => optional($f->created_at)->format('d-m-Y H:i'),
                    'created_by' => $f->createdByUser?->name ?? 'Unknown',
                    'updated_by' => $f->updatedByUser?->name ?? 'N/A',
                ];
            });

        return response()->json([
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'enrollment_no' => $student->enrollment_no,
            ],
            'followups' => $followups,
        ]);
    }

    // Store a new follow-up
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'followup_date'  => 'required|date',
            'remark'         => 'nullable|string',
        ]);

        $validated['created_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();

        $followup = StudentFollowup::create($validated);

        return response()->json([
            'message' => 'Follow-up added successfully.',
            'followup' => [
                'id' => $followup->id,
                'followup_date' => optional($followup->followup_date)->format('d-m-Y'),
                'remark' => $followup->remark,
                'created_at' => optional($followup->created_at)->format('d-m-Y H:i'),
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'followup_date' => 'required|date',
            'remark'        => 'nullable|string',
        ]);

        $followup = StudentFollowup::findOrFail($id);
        $validated['updated_by'] = auth()->id(); // Add this
        $followup->update($validated);

        return response()->json([
            'message' => 'Follow-up updated successfully.',
            'followup' => [
                'id' => $followup->id,
                'followup_date' => optional($followup->followup_date)->format('d-m-Y'),
                'remark' => $followup->remark,
                'created_at' => optional($followup->created_at)->format('d-m-Y H:i'),
            ],
        ]);
    }

    // Delete a follow-up
    public function destroy($id)
    {
        $followup = StudentFollowup::findOrFail($id);
        $followup->delete();

        return response()->json(['message' => 'Follow-up deleted successfully.']);
    }

    public function edit($id)
    {
        $followup = StudentFollowup::findOrFail($id);
        return view('admin.followups.edit', compact('followup'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentContact;
use App\Models\StudentFollowup;
use App\Models\StudentAttendance;
use App\Models\StudentResult;
use App\Models\StudentSummary;
use Illuminate\Support\Facades\DB;
use App\Models\AdminPermission;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class StudentController extends Controller
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
            // Super Admin: Fetch all students with filters
            $students = Student::with(['contact', 'followups', 'attendances', 'results', 'summary'])
                ->when(
                    $search,
                    fn($query) =>
                    $query->where(
                        fn($q) =>
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('enrollment_no', 'like', "%{$search}%")
                    )
                )
                ->when($department, fn($query) => $query->where('department', $department))
                ->when($school, fn($query) => $query->where('school', $school))
                ->when($semester, fn($query) => $query->where('current_semester', $semester))
                ->when($division, fn($query) => $query->where('division', $division))
                ->orderByDesc('id')
                ->paginate(15)
                ->appends($request->query());

            $departments = Student::select('department')->distinct()->pluck('department');
            $schools = Student::select('school')->distinct()->pluck('school');
            $semesters = Student::select('current_semester')->distinct()->pluck('current_semester');
            $divisions = Student::select('division')->distinct()->pluck('division');

            return view('admin.students', compact(
                'students',
                'search',
                'department',
                'school',
                'semester',
                'division',
                'departments',
                'schools',
                'semesters',
                'divisions'
            ));
        } else {
            // Fetch allowed departments and semesters from multiple rows
            $permissions = AdminPermission::where('user_id', auth()->id())->get();

            $allowedDepartments = $permissions->pluck('department')->unique()->values()->toArray();
            $allowedSemesters = $permissions->pluck('semester')->unique()->values()->toArray();
            $allowedDivisions = $permissions->pluck('division')->unique()->values()->toArray();

            $students = Student::with(['contact', 'followups', 'attendances', 'results', 'summary'])
                ->whereIn('department', $allowedDepartments)
                ->whereIn('current_semester', $allowedSemesters)
                ->whereIn('division', $allowedDivisions)
                ->when(
                    $search,
                    fn($query) =>
                    $query->where(
                        fn($q) =>
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('enrollment_no', 'like', "%{$search}%")
                    )
                )
                ->when($department, fn($query) => $query->where('department', $department))
                ->when($school, fn($query) => $query->where('school', $school))
                ->when($semester, fn($query) => $query->where('current_semester', $semester))
                ->when($division, fn($query) => $query->where('division', $division))
                ->orderByDesc('id')
                ->paginate(15)
                ->appends($request->query());

            $departments = Student::whereIn('department', $allowedDepartments)
                ->select('department')->distinct()->pluck('department');

            $schools = Student::select('school')->distinct()->pluck('school');

            $semesters = Student::whereIn('current_semester', $allowedSemesters)
                ->select('current_semester')->distinct()->pluck('current_semester');

            $divisions = Student::whereIn('division', $allowedDivisions)
                ->select('division')->distinct()->pluck('division');

            return view('admin.students', compact(
                'students',
                'search',
                'department',
                'school',
                'semester',
                'division',
                'departments',
                'schools',
                'semesters',
                'divisions'
            ));
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'enrollment_no' => 'required|string|unique:students',
            'name' => 'required|string',
            'student_mobile' => 'nullable|string',
            'father_mobile' => 'nullable|string',
            'followup' => 'nullable|date',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'cast' => 'nullable|string',
            'category' => 'nullable|string',
            'aadhar_no' => 'nullable|string',
            'uid_no' => 'nullable|string',
            'email' => 'nullable|email',
            'gender' => 'nullable|string',
            'hsc_school_uni' => 'nullable|string',
            'hsc_city' => 'nullable|string',
            'abc_id' => 'nullable|string',
            'department' => 'nullable|string',
            'school' => 'nullable|string',
            'current_semester' => 'nullable|integer',
            'division' => 'nullable|string' // ✅ Added division field
        ]);

        DB::transaction(function () use ($validated, $request) {
            // Auto-generate sr_no
            $validated['sr_no'] = (Student::max('sr_no') ?? 0) + 1;

            $student = Student::create($validated);

            StudentContact::create([
                'student_id' => $student->id,
                'student_mobile' => $request->student_mobile,
                'father_mobile' => $request->father_mobile,
            ]);

            if ($request->filled('followup')) {
                StudentFollowup::create([
                    'student_id' => $student->id,
                    'followup_date' => $request->followup,
                    'remark' => $request->remark,
                ]);
            }

            for ($i = 1; $i <= 8; $i++) {
                StudentAttendance::create([
                    'student_id' => $student->id,
                    'semester' => $i,
                    'attendance_percent' => $request->input("attendance_$i", 0),
                ]);

                StudentResult::create([
                    'student_id' => $student->id,
                    'semester' => $i,
                    'sgpa' => $request->input("result_$i", null),
                    'backlog_count' => $request->input("backlog_$i", 0),
                ]);
            }

            StudentSummary::create([
                'student_id' => $student->id,
                'cgpa' => $request->input("cgpa", 0),
            ]);
        });

        return redirect()->route('admin.students')->with('success', 'Student added successfully.');
    }


    public function edit($id)
    {
        $student = Student::with(['contact', 'followups', 'attendances', 'results', 'summary'])->findOrFail($id);
        return response()->json($student);
    }


    public function show($id)
    {
        $student = Student::with(['contact', 'followups', 'attendances', 'results', 'summary'])->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'enrollment_no' => 'required|string|unique:students,enrollment_no,' . $student->id,
            'name' => 'required|string',
            'student_mobile' => 'nullable|string',
            'father_mobile' => 'nullable|string',
            'followup' => 'nullable|date',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'cast' => 'nullable|string',
            'category' => 'nullable|string',
            'aadhar_no' => 'nullable|string',
            'uid_no' => 'nullable|string',
            'email' => 'nullable|email',
            'gender' => 'nullable|string',
            'hsc_school_uni' => 'nullable|string',
            'hsc_city' => 'nullable|string',
            'abc_id' => 'nullable|string',
            'department' => 'nullable|string',
            'school' => 'nullable|string',
            'current_semester' => 'nullable|integer',
            'division' => 'nullable|string|max:10',
        ]);

        DB::transaction(function () use ($student, $validated, $request) {
            $student->update($validated);

            $student->contact()->updateOrCreate(
                ['student_id' => $student->id],
                ['student_mobile' => $request->student_mobile, 'father_mobile' => $request->father_mobile]
            );

            if ($request->filled('followup')) {
                StudentFollowup::create([
                    'student_id' => $student->id,
                    'followup_date' => $request->followup,
                    'remark' => $request->remark, // Optional
                ]);
            }

            foreach ($student->attendances as $attendance) {
                $attendance->update([
                    'attendance_percent' => $request->input("attendance_{$attendance->semester}", 0),
                ]);
            }

            foreach ($student->results as $result) {
                $result->update([
                    'sgpa' => $request->input("result_{$result->semester}", null),
                    'backlog_count' => $request->input("backlog_{$result->semester}", 0),
                ]);
            }

            $student->summary()->updateOrCreate(
                ['student_id' => $student->id],
                [
                    'total_backlogs' => $request->input("total_backlogs", 0),
                    'cgpa' => $request->input("cgpa", 0),
                ]
            );
        });

        return redirect()->route('admin.students')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        DB::transaction(function () use ($student) {
            $student->contact()->delete();
            $student->followups()->delete();
            $student->attendances()->delete();
            $student->results()->delete();
            $student->summary()->delete();
            $student->delete();
        });

        return redirect()->route('admin.students')->with('success', 'Student deleted successfully.');
    }

    public function deleteAll()
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::transaction(function () {
                $studentIds = Student::pluck('id');

                DB::table('student_contacts')->whereIn('student_id', $studentIds)->delete();
                DB::table('student_followups')->whereIn('student_id', $studentIds)->delete();
                DB::table('student_attendance')->whereIn('student_id', $studentIds)->delete();
                DB::table('student_results')->whereIn('student_id', $studentIds)->delete();
                DB::table('student_summary')->whereIn('student_id', $studentIds)->delete();

                DB::table('students')->delete();
            });

            DB::statement('ALTER TABLE students AUTO_INCREMENT = 1');

            return redirect()->route('admin.students')->with('success', 'All students deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete students: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'csv_file' => 'required|file|mimes:csv,txt',
            ]);

            $file = $request->file('csv_file');
            $handle = fopen($file, 'r');
            $header = fgetcsv($handle); // First row (field names)
            $header = array_map(fn($h) => strtolower(trim($h)), $header);

            $importedCount = 0;
            $skippedCount = 0;
            $errors = [];

            while (($row = fgetcsv($handle)) !== false) {
                try {
                    $data = array_combine($header, $row);

                    // Check for duplicate enrollment_no or email
                    $exists = Student::where('enrollment_no', $data['enrollment_no'] ?? null)
                        ->orWhere('email', $data['email'] ?? null)
                        ->exists();

                    if ($exists) {
                        $skippedCount++;
                        continue;
                    }

                    // Generate next sr_no
                    $latestSrNo = Student::max('sr_no') ?? 0;
                    $data['sr_no'] = $latestSrNo + 1;

                    // Insert student
                    $student = Student::create([
                        'sr_no' => $data['sr_no'],
                        'name' => $data['name'] ?? null,
                        'enrollment_no' => $data['enrollment_no'] ?? null,
                        'department' => $data['department'] ?? null,
                        'current_semester' => $data['current_semester'] ?? null,
                        'school' => $data['school'] ?? null,
                        'division' => $data['division'] ?? null,
                        'dob' => $data['dob'] ?? null,
                        'email' => $data['email'] ?? null,
                        'gender' => $data['gender'] ?? null,
                        'address' => $data['address'] ?? null,
                        'cast' => $data['cast'] ?? null,
                        'category' => $data['category'] ?? null,
                        'aadhar_no' => $data['aadhar_no'] ?? null,
                        'uid_no' => $data['uid_no'] ?? null,
                        'hsc_school_uni' => $data['hsc_school_uni'] ?? $data['hsc_school'] ?? null,
                        'hsc_city' => $data['hsc_city'] ?? null,
                        'abc_id' => $data['abc_id'] ?? null,
                    ]);

                    // Insert Contact
                    $student->contact()->create([
                        'student_mobile' => $data['student_mobile'] ?? null,
                        'father_mobile' => $data['father_mobile'] ?? null,
                    ]);

                    // Insert Followups
                    $followupsRaw = $data['followups'] ?? '';
                    $trackingRaw = $data['followups_tracking'] ?? '';

                    $followupEntries = array_filter(explode('|', $followupsRaw));
                    $trackingEntries = array_filter(explode('|', $trackingRaw));

                    foreach ($followupEntries as $index => $entry) {
                        $entry = trim($entry);
                        $colonPos = strpos($entry, ':');

                        if ($colonPos !== false) {
                            $date = trim(substr($entry, 0, $colonPos));
                            $remark = trim(substr($entry, $colonPos + 1));
                        } else {
                            $date = trim($entry);
                            $remark = null;
                        }

                        try {
                            $parsedDate = Carbon::parse($date)->format('Y-m-d');
                            $tracking = $trackingEntries[$index] ?? '';
                            preg_match('/created_by:(.*?),updated_by:(.*)/', $tracking, $matches);
                            $createdByName = trim($matches[1] ?? '');
                            $updatedByName = trim($matches[2] ?? '');

                            $createdBy = User::where('name', $createdByName)->first()?->id;
                            $updatedBy = User::where('name', $updatedByName)->first()?->id;

                            $student->followups()->create([
                                'followup_date' => $parsedDate,
                                'remark' => ($remark === '' ? null : $remark),
                                'created_by' => $createdBy,
                                'updated_by' => $updatedBy,
                            ]);
                        } catch (\Exception $e) {
                            continue;
                        }
                    }

                    $currentSemester = (int) ($data['current_semester'] ?? 1);

                    // Attendance (Semester 1–8)
                    for ($i = 1; $i <= 8; $i++) {
                        $value = $data["attendance_$i"] ?? null;
                        $attendancePercent = ($i < $currentSemester && $value !== '') ? $value : null;

                        $student->attendances()->create([
                            'semester' => $i,
                            'attendance_percent' => $attendancePercent,
                        ]);
                    }

                    // Results and Backlogs (Semester 1–8)
                    for ($i = 1; $i <= 8; $i++) {
                        $sgpa = ($i < $currentSemester) ? ($data["result_$i"] ?? null) : null;
                        $backlogCount = ($i < $currentSemester) ? ($data["backlog_$i"] ?? null) : null;

                        $student->results()->create([
                            'semester' => $i,
                            'sgpa' => $sgpa,
                            'backlog_count' => $backlogCount,
                        ]);
                    }
                
                    $student->summary()->create([
                        'student_id' => $student->id,
                        'cgpa' => isset($data['cgpa']) && $data['cgpa'] !== '' ? $data['cgpa'] : null,
                    ]);

                    $importedCount++;
                } catch (\Exception $e) {
                    $errors[] = "Row " . ($importedCount + $skippedCount + 1) . ": " . $e->getMessage();
                    $skippedCount++;
                    continue;
                }
            }

            fclose($handle);

            if (count($errors)) {
                $errorMessage = "Imported $importedCount students, skipped $skippedCount records. Issues:\n" . implode("\n", array_slice($errors, 0, 5));
                if (count($errors) > 5) {
                    $errorMessage .= "\n...and " . (count($errors) - 5) . " more errors";
                }
                throw new \Exception($errorMessage);
            }

            return response()->json([
                'success' => true,
                'message' => "Successfully imported $importedCount students" . ($skippedCount ? " (skipped $skippedCount duplicates)" : ""),
                'imported' => $importedCount,
                'skipped' => $skippedCount
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'imported' => $importedCount ?? 0,
                'skipped' => $skippedCount ?? 0
            ], 422);
        }
    }
}

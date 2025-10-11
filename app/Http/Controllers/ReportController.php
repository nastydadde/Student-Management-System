<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AdminPermission;
use ZipArchive;
use App\Models\StudentSummary;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
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
            $summaries = StudentSummary::whereIn('student_id', $students->pluck('id'))->get()->keyBy('student_id');

            return view('admin.report', compact('students', 'search', 'department', 'school', 'departments', 'schools', 'semester', 'semesters', 'division', 'divisions', 'summaries'));
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

            $summaries = StudentSummary::whereIn('student_id', $students->pluck('id'))->get()->keyBy('student_id');

            return view('admin.report', compact(
                'students',
                'search',
                'department',
                'school',
                'departments',
                'schools',
                'semester',
                'semesters',
                'division',
                'divisions',
                'summaries'
            ));
        }
    }


    public function generate(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'sections' => 'required|array|min:1',
        ]);

        $fields = $request->sections; // rename for consistency

        $relations = array_filter([
            in_array('contact', $fields) ? 'contact' : null,
            in_array('followups', $fields) ? 'followups' : null,
            in_array('attendances', $fields) ? 'attendances' : null,
            in_array('results', $fields) ? 'results' : null,
            in_array('summary', $fields) ? 'summary' : null,
        ]);

        $student = Student::with($relations)->findOrFail($request->student_id);

        $pdf = PDF::loadView('admin.report_pdf', [
            'student' => $student,
            'fields' => $fields,
        ]);

        return $pdf->download("student_{$student->id}_report.pdf");
    }

    public function generateAllReports(Request $request)
    {
        $request->validate([
            'sections' => 'required|array|min:1',
        ]);

        $fields = $request->sections;

        // Determine relationships to load based on selected fields
        $relations = array_filter([
            in_array('contact', $fields) ? 'contact' : null,
            in_array('followups', $fields) ? 'followups' : null,
            in_array('attendances', $fields) ? 'attendances' : null,
            in_array('results', $fields) ? 'results' : null,
            in_array('summary', $fields) ? 'summary' : null,
        ]);

        $query = Student::with($relations);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('enrollment_no', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('school')) {
            $query->where('school', $request->school);
        }

        if ($request->filled('semester')) {
            $query->where('current_semester', $request->semester);
        }

        if ($request->filled('division')) {
            $query->where('division', $request->division);
        }

        $students = $query->get();

        if ($students->isEmpty()) {
            return back()->with('error', 'No students found for the selected filters.');
        }

        // Temp folder setup
        $tempFolder = 'reports_temp';
        $folderPath = storage_path("app/{$tempFolder}");
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $zipFileName = 'student_reports_' . now()->format('Ymd_His') . '.zip';
        $zipPath = storage_path("app/{$zipFileName}");

        try {
            // Generate PDFs
            foreach ($students as $student) {
                $pdf = Pdf::loadView('admin.report_pdf', [
                    'student' => $student,
                    'fields' => $fields,
                ]);
                $filename = 'Report_' . $student->enrollment_no . '.pdf';
                $pdf->save("{$folderPath}/{$filename}");
            }

            // Zip the folder
            $zip = new ZipArchive;
            if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                foreach (glob("{$folderPath}/*.pdf") as $file) {
                    $zip->addFile($file, basename($file));
                }
                $zip->close();
            } else {
                throw new \Exception('Failed to create ZIP archive.');
            }

            return response()->download($zipPath)->deleteFileAfterSend(true);
        } finally {
            // Cleanup
            foreach (glob("{$folderPath}/*.pdf") as $file) {
                unlink($file);
            }
            if (is_dir($folderPath)) {
                rmdir($folderPath);
            }
        }
    }
}

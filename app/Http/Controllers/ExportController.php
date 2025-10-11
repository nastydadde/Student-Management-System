<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ExportController extends Controller
{
    public function index()
    {
        return view('admin.export');
    }

    public function download()
    {
        if (Auth::user()->role !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }

        $students = Student::with(['contact', 'followups', 'attendances', 'results'])->get();

        $headers = [
            'sr_no', 'name', 'enrollment_no', 'department', 'current_semester', 'division', 'school', 'dob', 'email', 'gender', 'address', 'cast',
            'category', 'aadhar_no', 'uid_no', 'hsc_school_uni', 'hsc_city', 'abc_id',
            'student_mobile', 'father_mobile', 'followups','followups_tracking',
            'attendance_1', 'attendance_2', 'attendance_3', 'attendance_4', 'attendance_5', 'attendance_6', 'attendance_7', 'attendance_8',
            'result_1', 'result_2', 'result_3', 'result_4', 'result_5', 'result_6', 'result_7', 'result_8',
            'backlog_1', 'backlog_2', 'backlog_3', 'backlog_4', 'backlog_5', 'backlog_6', 'backlog_7', 'backlog_8',
            'total_backlogs', 'cgpa',
        ];

        $rows = [];
        foreach ($students as $student) {
            $followupText = $student->followups->map(function ($f) {
                return $f->followup_date->format('Y-m-d') . ':' . $f->remark;
            })->implode(' | ');

            $followupTrackingText = $student->followups->map(function ($f) {
                $createdBy = optional($f->createdByUser)->name ?? 'N/A';
                $updatedBy = optional($f->updatedByUser)->name ?? 'N/A';
                return "created_by:$createdBy,updated_by:$updatedBy";
            })->implode(' | ');                       

            // Make sure all data is sorted by semester before padding
            $attendances = $student->attendances->sortBy('semester')->pluck('attendance_percent')->pad(8, '')->toArray();
            $results = $student->results->sortBy('semester')->pluck('sgpa')->pad(8, '')->toArray();
            $backlogs = $student->results->sortBy('semester')->pluck('backlog_count')->pad(8, '')->toArray();

            $cgpa = $student->results->whereNotNull('sgpa')->avg('sgpa');
            $totalBacklogs = $student->results->sum('backlog_count');

            $rows[] = [
                $student->sr_no,
                $student->name,
                $student->enrollment_no,
                $student->department,
                $student->current_semester,
                $student->division, 
                $student->school,
                $student->dob,
                $student->email,
                $student->gender,
                $student->address,
                $student->cast,
                $student->category,
                $student->aadhar_no,
                $student->uid_no,
                $student->hsc_school_uni,
                $student->hsc_city,
                $student->abc_id,
                $student->contact->student_mobile ?? '',
                $student->contact->father_mobile ?? '',
                $followupText,
                $followupTrackingText,
                ...$attendances,
                ...$results,
                ...$backlogs,
                $totalBacklogs,
                $cgpa ? round($cgpa, 2) : ''
            ];
        }

        $filename = "students_export_" . now()->format('Y_m_d_H_i') . ".csv";
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $headers);
        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        $csvContent = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}

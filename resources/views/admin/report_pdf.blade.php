<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Student Report</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #2d2d2d;
            background: #f7f9fc;
            line-height: 1.7;
            padding: 30px;
            margin: 0;
        }

        h1,
        h2 {
            font-family: 'Roboto', sans-serif;
            font-weight: 600;
            color: #bf1e2e;
        }

        h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #bf1e2e;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 6px;
            border-bottom: 1px solid #e2e2e2;
        }

        .report-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo {
            max-height: 80px;
            margin-bottom: 15px;
        }

        .badge {
            display: inline-block;
            background-color: #bf1e2e;
            color: #fff;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .section {
            background: #ffffff;
            padding: 22px 25px;
            border-radius: 10px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 32px;
            page-break-inside: avoid;
        }

        .info-row {
            display: flex;
            margin-bottom: 10px;
            gap: 10px;
        }

        .info-label {
            width: 220px;
            font-weight: 500;
            color: #6a6a6a;
            flex-shrink: 0;
        }

        .info-value {
            font-weight: 500;
            color: #2b2b2b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 13px;
        }

        th,
        td {
            padding: 10px 12px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #bf1e2e;
            color: #fff;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.4px;
            border-bottom: 1px solid #c43a3a;
        }

        td {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
        }

        tr:nth-child(even) td {
            background-color: #f5f5f5;
        }

        tr:hover td {
            background-color: #f1f1f1;
        }

        .highlight {
            background-color: #fff5e0;
            color: #d35400;
            padding: 3px 7px;
            border-radius: 4px;
            font-weight: 600;
        }

        .report-footer {
            margin-top: 60px;
            text-align: center;
            font-size: 12px;
            color: #888;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .section {
                box-shadow: none;
            }

            .report-footer {
                border-top: none;
            }

            .badge {
                background-color: #bf1e2e !important;
                color: #fff !important;
            }

            a {
                color: black;
                text-decoration: none;
            }
        }
    </style>

</head>

<body>

    <div class="report-header">
        <div class="logo-container">
            <p class="h-12 mb-2 text-3xl text-red-700">Team 818</p>
            <!-- <img src="{{ public_path('storage/logo_4.png') }}" class="logo" alt=""> -->
        </div>
        <h1>Student Report</h1>
    </div>

    {{-- Basic Information --}}
    <div class="section">
        <h2>Basic Information</h2>
        <div class="info-row"><span class="info-label">SR No:</span> <span class="info-value">{{ $student->sr_no ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Name:</span> <span class="info-value">{{ $student->name }}</span></div>
        <div class="info-row"><span class="info-label">Enrollment No:</span> <span class="info-value">{{ $student->enrollment_no }}</span></div>
        <div class="info-row"><span class="info-label">Department:</span> <span class="info-value">{{ $student->department }}</span></div>
        <div class="info-row"><span class="info-label">Current Semester:</span> <span class="info-value">{{ $student->current_semester }}</span></div>
        <div class="info-row"><span class="info-label">Division:</span> <span class="info-value">{{ $student->division }}</span></div>
        <div class="info-row"><span class="info-label">School:</span> <span class="info-value">{{ $student->school }}</span></div>
        <div class="info-row"><span class="info-label">Date of Birth:</span> <span class="info-value">{{ $student->dob ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Gender:</span> <span class="info-value">{{ ucfirst($student->gender ?? '-') }}</span></div>
        <div class="info-row"><span class="info-label">Address:</span> <span class="info-value">{{ $student->address ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Caste:</span> <span class="info-value">{{ $student->cast ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Category:</span> <span class="info-value">{{ $student->category ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Aadhar No:</span> <span class="info-value">{{ $student->aadhar_no ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">UID No:</span> <span class="info-value">{{ $student->uid_no ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">ABC ID:</span> <span class="info-value">{{ $student->abc_id ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Email:</span> <span class="info-value">{{ $student->email ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">HSC School/University:</span> <span class="info-value">{{ $student->hsc_school_uni ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">HSC City:</span> <span class="info-value">{{ $student->hsc_city ?? '-' }}</span></div>
    </div>

    {{-- Contact --}}
    @if(in_array('contact', $fields))
    <div class="section">
        <h2>Contact Details</h2>
        <div class="info-row"><span class="info-label">Student Mobile:</span> <span class="info-value">{{ $student->contact->student_mobile ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Father Mobile:</span> <span class="info-value">{{ $student->contact->father_mobile ?? '-' }}</span></div>
    </div>
    @endif

    {{-- Followups --}}
    @if(in_array('followups', $fields))
    <div class="section">
        <h2>Follow-Ups</h2>
        @if($student->followups->count())
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Remark</th>
                    <th>Added At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->followups as $f)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($f->followup_date)->format('d-m-Y') }}</td>
                    <td>{{ $f->remark ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($f->created_at)->format('d-m-Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No follow-up records found.</p>
        @endif
    </div>
    @endif

    {{-- Attendance --}}
    @if(in_array('attendance', $fields))
    @php
    $attendances = $student->attendances;
    $nonNull = $attendances->whereNotNull('attendance_percent');
    $averageAttendance = $nonNull->count() > 0 ? round($nonNull->avg('attendance_percent'), 1) : null;
    @endphp
    <div class="section">
        <h2>Attendance</h2>
        <table>
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Attendance %</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $a)
                <tr>
                    <td>{{ $a->semester }}</td>
                    <td>{{ ($a->attendance_percent == 0 || $a->attendance_percent === null) ? '-' : $a->attendance_percent }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="info-row"><span class="info-label">Average Attendance:</span> <span class="info-value">{{ $averageAttendance ?? '-' }}%</span></div>
    </div>
    @endif

    {{-- Results --}}
    @if(in_array('results', $fields))
    <div class="section">
        <h2>Results</h2>
        <table>
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>SGPA</th>
                    <th>Backlogs</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->results as $r)
                <tr>
                    <td>{{ $r->semester }}</td>
                    <td>{{ $r->sgpa ?? '-' }}</td>
                    <td>{{ $r->backlog_count === null ? '-' : $r->backlog_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    {{-- Summary --}}
    @if(in_array('summary', $fields))
    @php
    $totalBacklogs = $student->results->sum('backlog_count');
    $cgpa = $student->summary->cgpa ?? 'N/A';
    @endphp
    <div class="section">
        <h2>Summary</h2>
        <div class="info-row"><span class="info-label">Total Backlogs:</span> <span class="info-value">{{ $totalBacklogs }}</span></div>
        <div class="info-row"><span class="info-label">CGPA:</span> <span class="info-value">{{ $cgpa ?? '-' }}</span></div>
    </div>
    @endif

</body>

</html>

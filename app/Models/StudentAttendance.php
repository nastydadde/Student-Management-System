<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public $timestamps = false;
    protected $table = 'student_attendance'; // ✅ Explicit table name

    protected $fillable = [
        'student_id',
        'semester',
        'attendance_percent',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

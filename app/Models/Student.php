<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'sr_no',
        'name',
        'enrollment_no',
        'dob',
        'gender',
        'address',
        'cast',
        'category',
        'aadhar_no',
        'uid_no',
        'email',
        'abc_id',
        'hsc_school_uni',
        'hsc_city',
        'department',
        'school',
        'current_semester',
        'division'
    ];

    public function contact()
    {
        return $this->hasOne(StudentContact::class);
    }

    public function followups()
    {
        return $this->hasMany(StudentFollowup::class);
    }

    public function attendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }

    public function results()
    {
        return $this->hasMany(StudentResult::class);
    }

    public function summary()
    {
        return $this->hasOne(StudentSummary::class);
    }
}

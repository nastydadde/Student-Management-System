<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFollowup extends Model
{
    protected $table = 'student_followups';

    protected $fillable = [
        'student_id',
        'followup_date',
        'remark',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'followup_date' => 'date', // Optional: helps with formatting follow-up date too
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // App\Models\StudentFollowup.php

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

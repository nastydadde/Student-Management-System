<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'student_id',
        'semester',
        'sgpa',
        'backlog_count',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

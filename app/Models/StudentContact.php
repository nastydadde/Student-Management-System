<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'student_id',
        'student_mobile',
        'father_mobile',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSummary extends Model
{
    public $timestamps = false;
    protected $table = 'student_summary'; // ✅ Explicit table name

    protected $fillable = [
        'student_id',
        'cgpa',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

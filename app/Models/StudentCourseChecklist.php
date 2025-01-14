<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseChecklist extends Model
{
    use HasFactory;

    protected $table = 'student_course_checklist'; // Explicitly set the table name

    protected $fillable = ['sy_taken', 'final_grade', 'instructor'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
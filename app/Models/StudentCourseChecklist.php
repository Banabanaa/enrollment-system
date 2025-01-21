<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseChecklist extends Model
{
    use HasFactory;

    // Explicitly set the table name if it's different from the default
    protected $table = 'student_course_checklist'; 

    // Specify the fillable fields to allow mass assignment
    protected $fillable = ['student_id', 'course_code', 'sy_taken', 'final_grade', 'instructor'];

    // Relationship with the Course model (using the 'course_code' as foreign key)
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }

    // Relationship with the Student model (using 'student_id' as foreign key)
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function showEnrollmentStatus(Request $request)
    {
        // Fetch student information
        $student = Student::where('id', auth()->id())->firstOrFail();
    
        // Pass data to the view
        return view('student.enrollment-status', compact('student'));
    }
    
    // Relationship with the Instructor model (using 'instructor' as foreign key)
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor', 'id');
    }
}


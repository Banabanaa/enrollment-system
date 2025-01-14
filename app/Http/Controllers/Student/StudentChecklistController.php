<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourseChecklist; // Make sure to use the correct model

class StudentChecklistController extends Controller
{
    public function showChecklist($studentId)
{
    // Best practice would be to validate $studentId here if necessary

    $student = Student::where('student_id', $studentId)->first(); // Use student_id in the where clause

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    // Now return the view with the student data
    return view('student.checklist', compact('student'));
}


}

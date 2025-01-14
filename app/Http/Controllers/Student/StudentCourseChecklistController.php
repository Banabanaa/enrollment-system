<?php

namespace App\Http\Controllers\Student;

use App\Models\StudentCourseChecklist;
use App\Http\Controllers\Controller;

class StudentCourseChecklistController extends Controller
{
    public function index()
    {
        // Get the logged-in student's ID
        $studentId = auth()->guard('student')->id();

        // Fetch the checklist for the logged-in student using the correct column
        $studentCourseChecklist = StudentCourseChecklist::where('id', $studentId)
            ->with('course') // Eager load related course data
            ->get();

        // Pass the checklist data to the view
        return view('student.view.checklist', compact('studentCourseChecklist'));
    }
}


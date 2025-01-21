<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\Controller;

class SEnrollmentController extends Controller
{
    public function showEnrollmentStatus()
    {
        // Retrieve the currently authenticated student
        $student = auth('student')->user();

        // Pass the student data to the view
        return view('student.view.enrollment', compact('student'));
    }
}


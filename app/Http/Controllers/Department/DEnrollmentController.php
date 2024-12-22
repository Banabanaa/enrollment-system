<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Student; // Make sure you import the Student model

class DEnrollmentController extends Controller
{
    public function regular()
    {
        // Fetching students with 'regular' classification
        $students = Student::where('classification', 'regular')->get();
        
        // Passing data to the view
        return view('department.enrollment.regular', compact('students'));
    }

    public function irregular()
    {
        // Fetching students with 'irregular' classification
        $students = Student::where('classification', 'irregular')->get();
        
        // Passing data to the view
        return view('department.enrollment.irregular', compact('students'));
    }

    public function transferee()
    {
        // Fetching students with 'transferee' classification
        $students = Student::where('classification', 'transferee')->get();
        
        // Passing data to the view
        return view('department.enrollment.transferee', compact('students'));
    }

    public function returnee()
    {
        // Fetching students with 'returnee' classification
        $students = Student::where('classification', 'returnee')->get();
        
        // Passing data to the view
        return view('department.enrollment.returnee', compact('students'));
    }
}

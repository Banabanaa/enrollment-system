<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Student; // Make sure you import the Student model

class EnrollmentController extends Controller
{
    public function regular()
    {
        // Fetching students with 'regular' classification
        $students = Student::where('classification', 'regular')->get();
        
        // Passing data to the view
        return view('registrar.enrollment.regular', compact('students'));
    }

    public function irregular()
    {
        // Fetching students with 'irregular' classification
        $students = Student::where('classification', 'irregular')->get();
        
        // Passing data to the view
        return view('registrar.enrollment.irregular', compact('students'));
    }

    public function transferee()
    {
        // Fetching students with 'transferee' classification
        $students = Student::where('classification', 'transferee')->get();
        
        // Passing data to the view
        return view('registrar.enrollment.transferee', compact('students'));
    }

    public function returnee()
    {
        // Fetching students with 'returnee' classification
        $students = Student::where('classification', 'returnee')->get();
        
        // Passing data to the view
        return view('registrar.enrollment.returnee', compact('students'));
    }

    public function undereval()
    {
        // Fetching students with 'undereval' classification
        $students = Student::where('classification', 'under evaluation')->get();
        
        // Passing data to the view
        return view('registrar.enrollment.undereval', compact('students'));
    }
}

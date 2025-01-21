<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Student; 
use Illuminate\Http\Request;

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

        foreach ($students as $student) {
            $student->decoded_courses = json_decode($student->courses, true); // Decode JSON
        }
        
        // Passing data to the view
        return view('registrar.enrollment.undereval', compact('students'));
    }

    public function enrollStudent(Request $request, $id)
    {
        $request->validate([
            'classification' => 'required|string',
            'year' => 'required|string|max:20',
            'section' => 'required|string|max:20', 
        ]);
    
        $student = Student::findOrFail($id);
        $student->classification = $request->input('classification');
        $student->year = $request->input('year');
        $student->section = $request->input('section');
        $student->save();
    
        return redirect()->back()->with('success', 'Student enrolled successfully!');
    }
    
    
}

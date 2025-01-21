<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Student; 
use Illuminate\Http\Request;
use DB;

class EnrollmentController extends Controller
{
    public function regular()
    {
        // Fetching students with 'regular' classification
        $students = Student::where('classification', 'regular')->get();
        
        // Fetching existing sections for 1st Year (can be customized to all years or based on the year)
        $existingSections = DB::table('students')
            ->select('section')
            ->where('classification', 'regular')
            ->get()
            ->pluck('section')
            ->toArray();

        // Passing data to the view
        return view('registrar.enrollment.regular', compact('students', 'existingSections'));
    }

    public function irregular()
    {
        // Fetching students with 'irregular' classification
        $students = Student::where('classification', 'irregular')->get();
        
        // Fetching existing sections for Irregular students
        $existingSections = DB::table('students')
            ->select('section')
            ->where('classification', 'irregular')
            ->get()
            ->pluck('section')
            ->toArray();

        // Passing data to the view
        return view('registrar.enrollment.irregular', compact('students', 'existingSections'));
    }

    public function undereval()
    {
        // Fetching students with 'undereval' classification
        $students = Student::where('classification', 'under evaluation')->get();

        foreach ($students as $student) {
            $student->decoded_courses = json_decode($student->courses, true); // Decode JSON
        }

        // Fetching existing sections for "Under Evaluation" students
        $existingSections = DB::table('students')
            ->select('section')
            ->where('classification', 'under evaluation')
            ->get()
            ->pluck('section')
            ->toArray();

        // Passing data to the view
        return view('registrar.enrollment.undereval', compact('students', 'existingSections'));
    }

    public function enrollStudent(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'classification' => 'required|string',
            'year' => 'required|string|max:20',
            'section' => 'required|string|max:20',
        ]);
    
        // Checking if the selected section is already taken for the year (classifiable check)
        $sectionCount = Student::where('section', $request->section)
            ->where('year', $request->year)
            ->count();
        
        if ($sectionCount > 0) { //Set up limit for students sections
            return redirect()->back()->withErrors(['section' => 'This section is already full of students enrolled. Please select another section.']);
        }
    
        // Find student and save changes
        $student = Student::findOrFail($id);
        $student->classification = $request->input('classification');
        $student->year = $request->input('year');
        $student->section = $request->input('section');
        $student->save();
    
        return redirect()->back()->with('success', 'Student enrolled successfully!');
    }
}

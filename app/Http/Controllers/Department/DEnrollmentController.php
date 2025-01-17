<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Mail;  // Make sure to import Mail class
use App\Mail\StudentAdvisingMail;  // Assuming you have this mail class for advising
use Illuminate\Support\Facades\Mail as FacadesMail;

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
    // Fetch irregular students
    $students = Student::where('classification', 'irregular')
        ->where('status', 'consult')
        ->get();

    // Fetch all courses
    $courses = Course::all(); // Ensure Course model exists and database table is not empty

    // Pass students and courses to the view
    return view('department.enrollment.irregular', compact('students', 'courses'));
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
    public function showIrregularStudents()
{
    $students = Student::where('classification', 'irregular')
        ->where('status', 'pending')
        ->get();

    $courses = Course::all();
    dd($courses); // Check if courses data is fetched

    return view('registrar.enrollment.irregular', compact('students', 'courses'));
}

public function adviseStudent(Request $request)
{
    try {
        $validated = $request->validate([
            'student_number' => 'required|exists:students,student_number',
            'courses' => 'required|array|min:1',
            'courses.*' => 'exists:courses,id',
            'advising_notes' => 'nullable|string',
        ]);

        // Logic to process advising
        return response()->json(['success' => true, 'message' => 'Advising completed successfully.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

}

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
        // Validate the incoming request data
        $request->validate([
            'student_number' => 'required|exists:students,student_number',
            'courses' => 'required|array',
            'advising_notes' => 'required|string',
        ]);

        // Fetch the student by their student_number
        $student = Student::where('student_number', $request->student_number)->first();

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found.']);
        }

        // Update the student's status to 'pending'
        $student->status = 'pending';
        $student->save();

        // Fetch the courses based on course IDs passed
        $courses = Course::whereIn('id', $request->courses)->get();
        $courseList = $courses->map(function ($course) {
            return $course->course_code . ' - ' . $course->course_title;
        })->implode(', ');

        // Send email to the student with advising details
        FacadesMail::to($student->email)->send(new StudentAdvisingMail($student, $courseList, $request->advising_notes));

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Student status updated to Pending and email sent.']);
    }
}

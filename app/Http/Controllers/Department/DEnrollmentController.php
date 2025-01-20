<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Mail;  // Make sure to import Mail class
use App\Mail\StudentAdvisingMail;  // Assuming you have this mail class for advising
use Illuminate\Support\Facades\Mail as FacadesMail;

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use App\Models\Advising; // Import the Advising model
use Illuminate\Http\Request;
use Mail;  // Make sure to import the Mail class
use App\Mail\StudentAdvisingMail;  // Assuming you have this mail class for advising
use Illuminate\Support\Facades\Mail as FacadesMail;

class DEnrollmentController extends Controller
{
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

    public function adviseStudent(Request $request)
    {
        try {
            // Validate incoming data
            $validated = $request->validate([
                'student_number' => 'required|exists:students,student_number',
                'courses' => 'required|array|min:1',
                'courses.*' => 'exists:courses,id',
                'advising_notes' => 'nullable|string',
                'department_first_name' => 'required|string',
                'department_last_name' => 'required|string',
            ]);

            // Fetch the student using the student number
            $student = Student::where('student_number', $validated['student_number'])->first();

            if (!$student) {
                return response()->json(['success' => false, 'message' => 'Student not found.'], 404);
            }

            // Create new advising record
            $advising = new Advising();
            $advising->student_number = $student->student_number;
            $advising->first_name = $student->first_name;
            $advising->middle_name = $student->middle_name;
            $advising->last_name = $student->last_name;
            $advising->advised_courses = json_encode($validated['courses']); // Store advised courses as JSON
            $advising->advising_notes = $validated['advising_notes'];
            $advising->department_first_name = $validated['department_first_name'];
            $advising->department_last_name = $validated['department_last_name'];

            // Save the advising record to the database
            $advising->save();

            // Send advising email to student
            // Assuming the StudentAdvisingMail class exists and is properly set up
            FacadesMail::to($student->email)->send(new StudentAdvisingMail($advising));

            // Return success response
            return response()->json(['success' => true, 'message' => 'Advising completed successfully.']);

        } catch (\Exception $e) {
            // Handle any errors and return a response
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}


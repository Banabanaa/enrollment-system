<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PreEnrollmentController extends Controller
{
    public function showPreEnrollmentForm()
    {
        // Get logged-in student
        $student = Auth::user(); 

        // Ensure the student exists and the courses column is populated
        if (!$student || empty($student->courses)) {
            return view('student.addons.preenrollment', ['error' => 'No advised courses found.']);
        }

        // Decode the JSON column (advised courses)
        $advisedCourses = json_decode($student->courses, true);

        // Calculate the total units (lecture + laboratory)
        $totalLectureUnits = 0;
        $totalLabUnits = 0;
        foreach ($advisedCourses as $course) {
            $totalLectureUnits += $course['credit_unit_lecture'];
            $totalLabUnits += $course['credit_unit_laboratory'];
        }

        // Calculate total units (lecture + laboratory)
        $totalUnits = $totalLectureUnits + $totalLabUnits;

        // Check if the student meets the 21 unit requirement
        $meetsRequirement = $totalUnits >= 21;

        // Pass the advised courses, calculated totals, and requirement status to the view
        return view('student.addons.preenrollment', compact('student', 'advisedCourses', 'totalLectureUnits', 'totalLabUnits', 'totalUnits', 'meetsRequirement'));
    }

    public function removeCourse(Request $request)
    {
        $student = Auth::user();
        $courseCode = $request->input('course_code');

        // Decode the student's advised courses
        $advisedCourses = json_decode($student->courses, true);

        // Filter out the course by the given course code
        $advisedCourses = array_filter($advisedCourses, function ($course) use ($courseCode) {
            return $course['course_code'] !== $courseCode; // Remove course by code
        });

        // Save the updated course list back to the student's `courses` field
        $student->courses = json_encode(array_values($advisedCourses)); // Re-index the array to preserve numeric keys
        $student->save();

        // Redirect back with a success message
        return back()->with('success', 'Course removed successfully!');
    }

    public function confirmAction(Request $request)
    {
        $student = Auth::user();

        // Set the confirmation flag to true
        $student->confirmation_action_taken = true;
        $student->save();

        return redirect()->route('student.addons.preenrollment');  // Redirect back to the page
    }
}

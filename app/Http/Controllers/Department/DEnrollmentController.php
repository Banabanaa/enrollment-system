<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

use App\Mail\AdvisingMail;
use Illuminate\Support\Facades\Mail;

class DEnrollmentController extends Controller
{
    
    public function adviseStudent(Request $request, $id)
    {
        $request->validate([
            'courses' => 'nullable|array',
            'advising_notes' => 'nullable|string|max:255',
            'classification' => 'required|string',
        ]);
    
        $student = Student::findOrFail($id);
    
        // Decode existing courses if it's a string
        $existingCourses = $student->courses ?? [];
        if (is_string($existingCourses)) {
            $existingCourses = json_decode($existingCourses, true) ?? [];
        }
    
        // Filter null or invalid course codes
        $filteredCourses = array_filter($request->input('courses', []), function ($courseCode) {
            return !is_null($courseCode) && $courseCode !== '';
        });
    
        // Fetch course details
        $coursesToSave = Course::whereIn('course_code', $filteredCourses)
        ->get(['course_code', 'course_title'])
        ->map(function ($course) {
            return [
                'course_code' => $course->course_code,
                'course_title' => $course->course_title,
            ];
        })->toArray();

    
        // Merge existing and new courses, ensuring no duplicates
        $mergedCourses = array_unique(array_merge($existingCourses, $coursesToSave), SORT_REGULAR);
    
        // Save merged courses as JSON
        $student->courses = json_encode($mergedCourses);
        $student->advising_notes = $request->input('advising_notes');
        $student->classification = $request->input('classification');
        $student->save();
    
        // Send email to the student
        Mail::to($student->email)->send(new AdvisingMail($student, $request->input('advising_notes'), $mergedCourses));
    
        return redirect()->back()->with('success', 'Student advised successfully!');
    }    
    

    public function pending()
    {
        $students = Student::where('classification', 'pending')->get();
        $courses = Course::all();
        return view('department.enrollment.pending', compact('students', 'courses'));
    }

    public function undereval()
    {
        $students = Student::where('classification', 'under evaluation')->get();
        $courses = Course::all();
        return view('department.enrollment.undereval', compact('students', 'courses'));
    }
}

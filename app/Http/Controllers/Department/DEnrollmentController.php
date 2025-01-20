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
    
        // Filter courses by the student's program ID
        $courses = Course::where('program_id', $student->program_id)->get();
    
        // Get the selected courses from the request and filter out empty values
        $filteredCourses = array_filter($request->input('courses', []), function ($courseCode) {
            return !is_null($courseCode) && $courseCode !== '';
        });
    
        // Fetch the full course information to store, not just course code/title
        $coursesToSave = Course::whereIn('course_code', $filteredCourses)
            ->get()
            ->map(function ($course) {
                return [
                    'course_code' => $course->course_code,
                    'course_title' => $course->course_title,
                    'program_id' => $course->program_id,
                    'year' => $course->year,
                    'semester' => $course->semester,
                    'credit_unit_lecture' => $course->credit_unit_lecture,
                    'credit_unit_laboratory' => $course->credit_unit_laboratory,
                    'pre_requisite' => $course->pre_requisite,
                ];
            })->toArray();
    
        // Overwrite the existing courses with the newly selected ones
        $student->courses = json_encode($coursesToSave);
        $student->advising_notes = $request->input('advising_notes');
        $student->classification = $request->input('classification');
        $student->save();
    
        // Send email to the student
        Mail::to($student->email)->send(new AdvisingMail($student, $request->input('advising_notes'), $coursesToSave));
    
        return redirect()->back()->with('success', 'Student advised successfully!');
    }
    

    public function pending()
    {
        $students = Student::where('classification', 'pending')->get();
        $courses = Course::orderBy('year')
        ->orderBy('semester')
        ->get();
        return view('department.enrollment.pending', compact('students', 'courses'));
    }

    public function undereval()
    {
        $students = Student::where('classification', 'under evaluation')->get();
        $courses = Course::all();
        return view('department.enrollment.undereval', compact('students', 'courses'));
    }
}

<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentCourseChecklist;
use App\Models\Course;
use App\Models\Instructor;

use App\Mail\AdvisingMail;
use Illuminate\Support\Facades\Mail;

class DEnrollmentController extends Controller
{
    
    public function adviseStudent(Request $request, $id)
    {
        $request->validate([
            'courses' => 'nullable|array',
            'courses.*' => 'string|exists:courses,course_code',
            'advising_notes' => 'nullable|string|max:255',
            'classification' => 'required|string|in:under evaluation,pending',
        ]);
    
        $student = Student::findOrFail($id);
    
        $filteredCourses = $request->input('courses', []);
        $coursesToSave = Course::whereIn('course_code', $filteredCourses)->get()->map(function ($course) {
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
    
        $student->courses = json_encode($coursesToSave, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $student->advising_notes = $request->input('advising_notes');
        $student->classification = $request->input('classification');
        $student->save();
    
        //Sent Email to Student
            Mail::to($student->email)->send(new AdvisingMail($student, $request->input('advising_notes'), $coursesToSave));
    
        return redirect()->back()->with('success', 'Student advised successfully!');
    }
    
    
    public function pending()
    {
        $students = Student::where('classification', 'pending')->get();
        $courses = Course::orderBy('year')
            ->orderBy('semester')
            ->get();
    
        // Fetch and group all course checklists for students with "pending" classification
        $courseChecklists = StudentCourseChecklist::whereIn('student_id', $students->pluck('id'))->get();
    
        $instructors = Instructor::all(); // Fetch all instructors

        return view('department.enrollment.pending', compact('students', 'courses', 'courseChecklists', 'instructors'));
    }
    
    
    


    public function undereval()
    {
        $students = Student::where('classification', 'under evaluation')->get();
        $courses = Course::all();
        return view('department.enrollment.undereval', compact('students', 'courses'));
    }
}

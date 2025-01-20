<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Student;

class StudentCourseChecklistController extends Controller
{
    public function index()
    {
        // Get the logged-in student's ID
        $studentId = auth()->guard('student')->id();
    
        // Fetch the student data (e.g., student photo)
        $student = Student::find($studentId);
    
        // Fetch the checklist data with a right join, including year and semester
        $studentCourseChecklist = DB::table('courses')
        ->leftJoin('student_course_checklist', function ($join) use ($studentId) {
            $join->on('courses.course_code', '=', 'student_course_checklist.course_code')
                ->where('student_course_checklist.student_id', $studentId); // Filter by logged-in student ID
        })
        ->leftJoin('instructors', 'student_course_checklist.instructor_id', '=', 'instructors.id') // Join instructors
        ->select(
            'courses.course_code',
            'courses.course_title',
            'courses.pre_requisite',
            'courses.year',
            'courses.semester',
            'student_course_checklist.sy_taken',
            'student_course_checklist.final_grade',
            'student_course_checklist.instructor_id',
            'instructors.first_name as instructor_first_name',
            'instructors.last_name as instructor_last_name'
        )
        ->orderBy('courses.year')
        ->orderBy('courses.semester')
        ->get()
        ->groupBy(function ($courses) {
            return $courses->year . ' - ' . $courses->semester;
        });
    
        // Fetch instructors data
        $instructors = Instructor::all(['id', 'first_name', 'last_name']);
    
        // Pass the grouped checklist data and student data to the view
        return view('student.view.checklist', [
            'student' => $student,
            'studentCourseChecklist' => $studentCourseChecklist,
            'instructors' => $instructors,
        ]);
    }
    

    public function store(Request $request)
    {
        // Get the logged-in student's ID
        $studentId = auth()->guard('student')->id();
    
        // Validate the input data
        $validatedData = $request->validate([
            'courses.*.sy_taken' => 'nullable|string|max:255',
            'courses.*.final_grade' => 'nullable|string|max:255',
            'courses.*.instructor_id' => 'nullable|exists:instructors,id',
        ]);
    
        // Loop through the courses and update or insert the data
        foreach ($request->input('courses') as $courseCode => $courseData) {
            DB::table('student_course_checklist')->updateOrInsert(
                [
                    // Condition to find the record
                    'student_id' => $studentId,
                    'course_code' => $courseCode,
                ],
                [
                    // Data to insert or update
                    'sy_taken' => $courseData['sy_taken'] ?? null,
                    'final_grade' => $courseData['final_grade'] ?? null,
                    'instructor_id' => $courseData['instructor_id'] ?? null,
                    'updated_at' => now(),
                ]
            );
        }
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Checklist updated successfully!');
    }
}

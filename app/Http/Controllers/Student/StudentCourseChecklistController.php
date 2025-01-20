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

        // Fetch the student data (for example, student photo)
        $student = Student::find($studentId);

        // Fetch the checklist data with a right join, including year and semester
        $studentCourseChecklist = DB::table('student_course_checklist')
            ->rightJoin('courses', 'courses.course_code', '=', 'student_course_checklist.course_code')
            ->select(
                'courses.course_code',
                'courses.course_title',
                'courses.pre_requisite',
                'courses.year',
                'courses.semester',
                'student_course_checklist.instructor',
                'student_course_checklist.sy_taken',
                'student_course_checklist.final_grade'
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
}





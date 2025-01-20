<?php


namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
class StudentCourseChecklistController extends Controller
{
    public function index()
    {
        // Get the logged-in student's ID
        $studentId = auth()->guard('student')->id();

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
                'student_course_checklist.final_grade',
            )
            ->orderBy('courses.year')
        ->orderBy('courses.semester')
            ->get()
            ->groupBy(function ($courses) {
                return $courses->year . ' - ' . $courses->semester;
            });
            $instructors = Instructor::all(['id', 'first_name', 'last_name']);
        // Pass the grouped checklist data to the view
        return view('student.view.checklist', ['studentCourseChecklist' => $studentCourseChecklist,'instructors' => $instructors,]);


    }

    public function store(Request $request)
{
    // Validate the necessary fields for each course
    $validated = $request->validate([
        'sy_taken' => 'required|string|max:255',
        'final_grade' => 'required|string|max:55',
        'id' => 'required|exists:instructors,id',
    ]);

    // Get the currently authenticated student's ID (student_number)
    $studentId = auth()->guard('student')->id();  // Assuming you're using the student guard

    // Loop through each course and save/update the data in the student_course_checklist table
    foreach ($validated['courses'] as $courseCode => $data) {
        // Insert or update the checklist data for the student and course
        StudentCourseChecklist::on('enrollment_system')->updateOrCreate(
            [
                'course_code' => $courseCode,
                'id' => $studentId,  // Use the student's ID dynamically
            ],
            [
                'sy_taken' => $data['sy_taken'],
                'final_grade' => $data['final_grade'],
                'instructor' => $data['id'], // Save the instructor's ID
            ]
        );
    }

    // Redirect with a success message
    return redirect()->route('student.manage.student-course-checklist.index')->with('success', 'Student course checklist updated successfully.');
}

    
}




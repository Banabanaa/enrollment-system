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

        // Fetch the student data (e.g., student photo and program_id)
        $student = Student::find($studentId);

        if (!$student) {
            return redirect()->back()->withErrors('Student not found.');
        }

        // Fetch the program_id of the student
        $programId = $student->program_id;

        // Define the programs to filter
        $programsToShow = [];
        if ($programId === 'Bachelor of Science in Computer Science') {
            $programsToShow = ['Bachelor of Science in Computer Science', '3'];
        } elseif ($programId === 'Bachelor of Science in Information Technology') {
            $programsToShow = ['Bachelor of Science in Information Technology', '3'];
        }

        // Fetch the checklist data with a right join, filtered by program_id
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
                'courses.program_id', // Include program_id in the selection
                'student_course_checklist.sy_taken',
                'student_course_checklist.final_grade',
                'student_course_checklist.instructor_id',
                'instructors.first_name as instructor_first_name',
                'instructors.last_name as instructor_last_name'
            )
            ->whereIn('courses.program_id', $programsToShow) // Filter by program_id
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
  

    public function showEnrollmentStatus(Request $request)
    {
        // Retrieve the logged-in student based on authentication or custom logic
        $student = Student::where('id', auth()->id())->firstOrFail(); // Adjust this based on your database schema and login logic
    
        // Pass the student data to the view
        return view('student.enrollment-status', compact('student'));
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
        $student = Student::findOrFail($request->student_id);
        $student->update(['classification' => 'pending']);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Checklist Saved and you are now pending / under evalutation.');
    }
}
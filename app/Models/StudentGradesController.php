<?php 
namespace App\Http\Controllers;

use App\Models\StudentCourseChecklist;
use App\Models\Instructor;

class StudentGradesController extends Controller
{

    public function showStudentGrades()
{
    // Fetch student course checklist with related data
    $studentCourseChecklist = StudentCourseChecklist::with(['course', 'instructor'])->get();

    // Fetch all instructors
    $instructors = Instructor::all(['id', 'first_name', 'last_name']);



    // Pass both $studentCourseChecklist and $instructors to the view
    return view('student.grades', [
        'studentCourseChecklist' => $studentCourseChecklist,
        'instructors' => $instructors,
    ]);
}



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{


    public function showStudentGrades()
    {
        // Fetch student course checklist with related data
        $studentCourseChecklist = StudentCourseChecklist::with(['course', 'instructor'])->get();
    
        // Fetch all instructors
        $instructors = Instructor::all(['id', 'first_name', 'last_name']);
    
        // Debugging: Remove dd() here for now
        // dd($instructors); 
    
        // Pass both $studentCourseChecklist and $instructors to the view
        return view('student.grades', [
            'studentCourseChecklist' => $studentCourseChecklist,
            'instructors' => $instructors,
        ]);
    }
    



}

<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Student;

class DashboardController extends Controller
{
    public function departmentDashboard()
    {
        $students = Student::all();
        $studentCount = Student::count(); // Total number of students

        // Get counts for students based on program_id
        $bscsCount = Student::where('program_id', 'BSIT')
        ->orWhere('program_id', 'Bachelor of Science in Computer Science')
        ->orWhere('program_id', 'Computer Science')
        ->count();
        $bsitCount = Student::where('program_id', 'BSIT')
        ->orWhere('program_id', 'Bachelor of Science in Information Technology')
        ->orWhere('program_id', 'Information Technology')
        ->count();

        return view('department.dashboard', compact(
            'students',
            'studentCount', 
            'bscsCount', // Count of Bachelor of Science in Computer Science students
            'bsitCount'  // Count of Bachelor of Science in Information Technology students
        ));
    }

}

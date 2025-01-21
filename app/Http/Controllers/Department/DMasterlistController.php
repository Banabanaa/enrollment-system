<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Student;

class DMasterlistController extends Controller
{
    public function index()
    {
        // Fetching students grouped by program
        $bsitStudents = Student::where('program_id', 'Bachelor of Science in Information Technology')->get();
        $bscsStudents = Student::where('program_id', 'Bachelor of Science in Computer Science')->get();

        // Passing the data to the view
        return view('department.addons.masterlist', compact('bsitStudents', 'bscsStudents'));
    }
}

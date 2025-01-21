<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Student;

class MasterlistController extends Controller
{
    public function index()
    {
        // Fetching students grouped by program
        $bsitStudents = Student::where('program_id', 'Bachelor of Science in Information Technology')->get();
        $bscsStudents = Student::where('program_id', 'Bachelor of Science in Computer Science')->get();

        // Passing the data to the view
        return view('registrar.addons.masterlist', compact('bsitStudents', 'bscsStudents'));
    }
}

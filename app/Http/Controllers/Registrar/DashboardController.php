<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Student;

class DashboardController extends Controller
{
    public function registrarDashboard()
    {
        
        $students = Student::all();
        $studentCount = Student::count(); // Total number of students

        // Get counts for specific classifications
        $bscsCount = Student::where('courses', 'BSCS')->count();
        $bsitCount = Student::where('courses', 'BSIT')->count();
        $regularCount = Student::where('classification', 'Regular')->count();
        $irregularCount = Student::where('classification', 'Irregular')->count();
        $transfereeCount = Student::where('classification', 'Transferee')->count();
        $returneeCount = Student::where('classification', 'Returnee')->count();
        $studentCount = Student::count();

        return view('registrar.dashboard', compact(
            'students',
            'bscsCount', 
            'bsitCount', 
            'regularCount', 
            'irregularCount', 
            'transfereeCount', 
            'returneeCount', 
            'studentCount'
        ));
    }
}

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
        $regularCount = Student::where('classification', 'regular')->count();
        $irregularCount = Student::where('classification', 'irregular')->count();
        $transfereeCount = Student::where('classification', 'transferee')->count();
        $returneeCount = Student::where('classification', 'returnee')->count();

        return view('registrar.dashboard', compact(
            'students',
            'studentCount', 
            'regularCount',
            'irregularCount',
            'transfereeCount',
            'returneeCount'
        ));
    }
}

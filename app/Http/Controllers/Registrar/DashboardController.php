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

        // Get counts for specific programs
        $bscsCount = Student::where('program_id', 'BSCS')
                            ->orWhere('program_id', 'Bachelor of Science in Computer Science')
                            ->orWhere('program_id', 'Computer Science')
                            ->count();
        $bsitCount = Student::where('program_id', 'BSIT')
                            ->orWhere('program_id', 'Bachelor of Science in Information Technology')
                            ->orWhere('program_id', 'Information Technology')
                            ->count();

        return view('registrar.dashboard', compact(
            'students',
            'studentCount', 
            'regularCount',
            'irregularCount',
            'transfereeCount',
            'returneeCount',
            'bscsCount',
            'bsitCount'
        ));
    }
}

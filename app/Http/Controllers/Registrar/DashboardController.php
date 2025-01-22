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

        // Get counts for specific courses and classifications
        $bscsCount = Student::whereIn('program_id', ['BSCS', 'Bachelor of Science in Computer Science'])->count();
        $bsitCount = Student::whereIn('program_id', ['BSIT', 'Bachelor of Science in Information Technology'])->count();
        $regularCount = Student::where('classification', 'Regular')->count();
        $irregularCount = Student::where('classification', 'Irregular')->count();
        $transfereeCount = Student::where('classification', 'Transferee')->count();
        $returneeCount = Student::where('classification', 'Returnee')->count();

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

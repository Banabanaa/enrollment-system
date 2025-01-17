<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function regular()
    {
        // Fetch regular students with a pending status
        $students = Student::where('classification', 'regular')
            ->get();

        return view('registrar.enrollment.regular', compact('students'));
    }

    public function irregular()
    {
        // Fetch irregular students with a pending status
        $students = Student::where('classification', 'irregular')
            ->where('status', 'pending') // Show only students with a pending status
            ->get();

        return view('registrar.enrollment.irregular', compact('students'));
    }

    public function transferee()
    {
        // Fetch transferee students with a pending status
        $students = Student::where('classification', 'transferee')
            ->where('status', 'pending') // Show only students with a pending status
            ->get();

        return view('registrar.enrollment.transferee', compact('students'));
    }

    public function returnee()
    {
        // Fetch returnee students with a pending status
        $students = Student::where('classification', 'returnee')
            ->where('status', 'pending') // Show only students with a pending status
            ->get();

        return view('registrar.enrollment.returnee', compact('students'));
    }

    public function enrollStudent($id)
    {
        try {
            $student = Student::findOrFail($id);

            // Update the status column to indicate enrollment
            $student->status = 'enrolled'; // Update the status to "enrolled"
            $student->save();

            return response()->json(['success' => true, 'message' => 'Student enrolled successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
    
    //CONSULTATION CONTROLLER(Updates student's status to "Consult")
    public function consultStudent($id)
    {
        try {
            $student = Student::findOrFail($id);

            // Update the status column to "consult"
            $student->status = 'consult';
            $student->save();

            return response()->json(['success' => true, 'message' => 'Student marked for consultation successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    
    
}

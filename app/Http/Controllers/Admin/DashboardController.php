<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Department;
use App\Models\Registrar;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $admins = Admin::all();
        $students = Student::all();
        $departments = Department::all();
        $registrars = Registrar::all();

        $studentCount = Student::count();  // Count the total number of students
        $adminCount = Admin::count();      // Count the total number of admins
        $registrarCount = Registrar::count();  // Count the total number of registrars
        $departmentCount = Department::count();  // Count the total number of departments

        return view('admin.dashboard', compact('admins', 'students', 'departments', 'registrars','studentCount', 'adminCount', 'registrarCount', 'departmentCount'));
    }

}

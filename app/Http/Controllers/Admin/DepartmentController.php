<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    // Show all departments
    public function index()
    {
        $departments = Department::all();
        return view('admin.manage.department', compact('departments'));
    }

    // Store a new department
    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'department_name' => 'required|string|max:255',
            'email' => 'required|email|unique:departments,email',
            'password' => 'required|string|min:8',
            'contact_number' => 'nullable|string|max:15',
        ]);

        Department::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? null,
            'department_name' => $validated['department_name'],
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.manage.department')->with('success', 'Department added successfully.');
    }

    // Update an existing department
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'department_name' => 'required|string|max:255',
            'email' => 'required|email|unique:departments,email,' . $id,
            'password' => 'nullable|min:8', // Password is optional
        ]);

        $department->last_name = $request->last_name;
        $department->first_name = $request->first_name;
        $department->middle_name = $request->middle_name;
        $department->department_name = $request->department_name;
        $department->email = $request->email;
        $department->contact_number = $request->contact_number;

        // Update password only if provided
        if ($request->filled('password')) {
            $department->password = bcrypt($request->password);
        }

        $department->save();

        return redirect()->route('admin.manage.department')->with('success', 'Department updated successfully.');
    }

    // Delete a department
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.manage.department')->with('success', 'Department deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all();
        return view('admin.manage.student', compact('students'));
    }

    // Store a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_number' => 'required|string|max:255|unique:students,student_number',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'extension_name' => 'nullable|string|max:10',
            'email' => 'required|email|unique:students,email',
            'contact_number' => 'nullable|string|max:15',
            'password' => 'required|string|min:8',
            'house_number' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
        ]);

        Student::create([
            'student_number' => $validated['student_number'],
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? null,
            'extension_name' => $validated['extension_name'] ?? null,
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'] ?? null,
            'password' => Hash::make($validated['password']),
            'house_number' => $validated['house_number'] ?? null,
            'street' => $validated['street'] ?? null,
            'barangay' => $validated['barangay'] ?? null,
            'city' => $validated['city'] ?? null,
            'province' => $validated['province'] ?? null,
            'zip_code' => $validated['zip_code'] ?? null,
        ]);

        return redirect()->route('admin.manage.student')->with('success', 'Student added successfully.');
    }

    // Update an existing student
    public function update(Request $request, $id)
{
    $request->validate([
        'student_number' => 'required|string',
        'last_name' => 'required|string',
        'first_name' => 'required|string',
        'middle_name' => 'nullable|string',
        'email' => 'required|email',
        'contact_number' => 'nullable|string',
        'password' => 'nullable|string|min:8',
        'classification' => 'required|in:regular,irregular,transferee,returnee',
    ]);

    $student = Student::findOrFail($id);
    $student->update($request->only([
        'student_number',
        'last_name',
        'first_name',
        'middle_name',
        'email',
        'contact_number',
        'classification',
    ]));

    if ($request->filled('password')) {
        $student->password = bcrypt($request->password);
        $student->save();
    }

    return redirect()->back()->with('success', 'Student information updated successfully.');
}


    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.manage.student')->with('success', 'Student deleted successfully.');
    }
    public function search(Request $request)
{
    \Log::info('Search query: ' . $request->input('query'));
    $students = Student::where('student_number', 'LIKE', "%{$request->input('query')}%")
        ->orWhere('first_name', 'LIKE', "%{$request->input('query')}%")
        ->orWhere('last_name', 'LIKE', "%{$request->input('query')}%")
        ->orWhere('email', 'LIKE', "%{$request->input('query')}%")
        ->orWhere('classification', 'LIKE', "%{$request->input('query')}%")
        ->get();

    return response()->json($students);
}


}

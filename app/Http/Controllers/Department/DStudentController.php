<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class DStudentController extends Controller
{
     // Show all students
     public function index()
     {
         $students = Student::all();
         return view('department.manage.student', compact('students'));
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
             'sex' => 'required|in:male,female,other',
             'classification' => 'required|in:incomplete,under evaluation,pending,regular,irregular,transferee,returnee', 
             'program_id' => 'required|in:Bachelor of Science in Computer Science,Bachelor of Science in Information Technology',
             'birthday' => 'nullable|date',  // Validation for birthday (ensure it's a valid date)
             'year' => 'nullable|string|max:20',
             'section' => 'nullable|string|max:20', 
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
             'sex' => $validated['sex'], 
             'classification' => $validated['classification'], 
             'program_id' => $validated['program_id'],  
             'birthday' => $validated['birthday'] ?? null,
             'year' => $validated['year'] ?? null,
             'section' => $validated['section'] ?? null,
         ]);
 
         return redirect()->route('department.manage.student')->with('success', 'Student added successfully.');
     }
 
     // Update an existing student
     public function update(Request $request, $id)
     {
         $student = Student::findOrFail($id);
 
         $request->validate([
             'student_number' => 'required|string|max:255|unique:students,student_number,' . $id,
             'last_name' => 'required|string|max:255',
             'first_name' => 'required|string|max:255',
             'middle_name' => 'nullable|string|max:255',
             'extension_name' => 'nullable|string|max:10',
             'email' => 'required|email|unique:students,email,' . $id,
             'contact_number' => 'nullable|string|max:15',
             'password' => 'nullable|min:8', // Password is optional for update
             'house_number' => 'nullable|string|max:255',
             'street' => 'nullable|string|max:255',
             'barangay' => 'nullable|string|max:255',
             'city' => 'nullable|string|max:255',
             'province' => 'nullable|string|max:255',
             'zip_code' => 'nullable|string|max:10',
             'sex' => 'required|in:male,female,other',  
             'classification' => 'required|in:incomplete,under evaluation,pending,regular,irregular,transferee,returnee',
             'program_id' => 'required|in:Bachelor of Science in Computer Science,Bachelor of Science in Information Technology', 
             'birthday' => 'nullable|date',
             'year' => 'nullable|string|max:20',
             'section' => 'nullable|string|max:20', 
         ]);
 
         $student->student_number = $request->student_number;
         $student->last_name = $request->last_name;
         $student->first_name = $request->first_name;
         $student->middle_name = $request->middle_name;
         $student->extension_name = $request->extension_name;
         $student->email = $request->email;
         $student->contact_number = $request->contact_number;
         $student->house_number = $request->house_number;
         $student->street = $request->street;
         $student->barangay = $request->barangay;
         $student->city = $request->city;
         $student->province = $request->province;
         $student->zip_code = $request->zip_code;
 
         // Update password only if provided
         if ($request->filled('password')) {
             $student->password = Hash::make($request->password);
         }
 
         // Update sex, classification, program_id, birthday, year, and section
         $student->sex = $request->sex;
         $student->classification = $request->classification;
         $student->program_id = $request->program_id;
         $student->birthday = $request->birthday;
         $student->year = $request->year; // Update year
         $student->section = $request->section; // Update section
 
         $student->save();
 
         return redirect()->route('department.manage.student')->with('success', 'Student updated successfully.');
     }
 
 
 
     // Delete a student
     public function destroy(Student $student)
     {
         $student->delete();
         return redirect()->route('department.manage.student')->with('success', 'Student deleted successfully.');
     }
}

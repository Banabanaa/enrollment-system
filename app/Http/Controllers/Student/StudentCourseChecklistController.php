<?php
// app/Http/Controllers/StudentCourseChecklistController.php

namespace App\Http\Controllers;

use App\Models\StudentCourseChecklist;
use Illuminate\Http\Request;

class StudentCourseChecklistController extends Controller
{
    // Method to show a specific checklist with its course
    public function show($id)
    {
        // Retrieve a checklist by its ID
        $checklist = StudentCourseChecklist::find($id); // Replace $id with your route parameter

        if ($checklist) {
            $course = $checklist->course; // Eager load the course data
            return view('checklists.show', compact('checklist', 'course')); // Pass data to a view
        } else {
            return redirect()->route('checklists.index')->with('error', 'Checklist not found.');
        }
    }
}

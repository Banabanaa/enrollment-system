<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Student;

class PhotoUploadController extends Controller
{
    public function upload(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the currently logged-in student
    $student = Student::find(auth()->guard('student')->id());

    // Check if a file is uploaded
    if ($request->file('photo')) {
        // Store the uploaded photo in the public/photos directory
        $file = $request->file('photo');
        $path = $file->store('photos', 'public');

        // Remove the old photo if it exists
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        // Save the new photo path in the database
        $student->photo = $path;
        $student->save();

        // Redirect to checklist or another view with success message
        return redirect()->route('student.view.checklist')->with('success', 'Photo uploaded successfully!');
        
    }

    // Return back with an error if the photo wasn't uploaded
    return back()->withErrors(['photo' => 'Photo upload failed.']);
}

}


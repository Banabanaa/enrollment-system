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
            'photo2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Second photo
        ]);
    
        // Get the currently logged-in student
        $student = Student::find(auth()->guard('student')->id());
    
        // Handle the first photo
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');
    
            // Remove the old photo if it exists
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
    
            $student->photo = $path;
        }
    
        // Handle the second photo
        if ($request->file('photo2')) {
            $file2 = $request->file('photo2');
            $path2 = $file2->store('photos', 'public');
    
            // Remove the old second photo if it exists
            if ($student->photo2) {
                Storage::disk('public')->delete($student->photo2);
            }
    
            $student->photo2 = $path2;
        }
    
        $student->save();
    
        return redirect()->route('student.view.checklist')->with('success', 'Photos uploaded successfully!');
    }
    

    public function deletePhoto()
    {
        $student = Student::find(auth()->guard('student')->id());

        if ($student) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
                $student->photo = null;
            }

            if ($student->photo2) {
                Storage::disk('public')->delete($student->photo2);
                $student->photo2 = null;
            }

            $student->save();
            return redirect()->route('student.view.checklist')->with('success', 'Photos deleted successfully!');
        }

        return redirect()->route('student.view.checklist')->withErrors(['photo' => 'No photos found to delete.']);
    }

}


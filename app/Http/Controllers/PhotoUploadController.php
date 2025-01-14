<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
        ]);

        // Handle the file upload
        if ($request->file('photo')) {
            $file = $request->file('photo');

            // For example, storing in the public disk
            $path = $file->store('photos', 'public'); // 'photos' is the folder name in 'storage/app/public'

            // Optionally, you can save the path in the database or do other actions here
            // Example: Auth::user()->update(['photo' => $path]);

            return back()->with('success', 'Photo uploaded successfully!')->with('path', $path);
        }

        return back()->withErrors('Photo upload failed.'); // In case of failure
    }
}


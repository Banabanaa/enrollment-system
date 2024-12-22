<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display the student dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function studentDashboard()
    {
        $student = Auth::user(); // Get the logged-in student
        return view('student.dashboard', compact('student'));
    }

    /**
     * Handle password update for the logged-in student.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'new_password' => 'required|min:8|confirmed', // Ensure password confirmation
        ]);

        // Get the logged-in student
        $student = Auth::user();

        // Update the student's password securely
        $student->password = Hash::make($request->new_password);
        $student->save();

        // Redirect back to the dashboard with a success message
        return redirect()->route('student.dashboard')->with('success', 'Password updated successfully.');
    }
}

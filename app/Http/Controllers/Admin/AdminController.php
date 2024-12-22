<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     */
    public function index()
    {
        $admins = Admin::paginate(10); // Paginate results for better performance
        return view('admin.manage.admin', compact('admins')); // Return the view with the admins
    }

    /**
     * Store a newly created admin in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.manage.admin')->with('success', 'Admin added successfully!');
    }

    /**
     * Update the specified admin in the database.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);

        $admin->update($validated);

        return redirect()->route('admin.manage.admin')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified admin from the database.
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();

        return redirect()->route('admin.manage.admin')->with('success', 'Admin deleted successfully!');
    }
}

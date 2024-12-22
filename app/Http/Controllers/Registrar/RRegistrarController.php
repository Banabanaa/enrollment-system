<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registrar;
use Illuminate\Support\Facades\Hash;

class RRegistrarController extends Controller
{
    public function index()
    {
        $registrars = Registrar::all();
        return view('registrar.manage.registrar', compact('registrars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:registrars,email',
            'password' => 'required|string|min:8',
            'contact_number' => 'nullable|string|max:15',
        ]);

        Registrar::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? null,
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('registrar.manage.registrar')->with('success', 'Registrar added successfully.');
    }


    public function update(Request $request, $id)
    {
        $registrar = Registrar::findOrFail($id);

        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:registrars,email,' . $id,
            'password' => 'nullable|min:8', // Password is optional
        ]);

        $registrar->last_name = $request->last_name;
        $registrar->first_name = $request->first_name;
        $registrar->middle_name = $request->middle_name;
        $registrar->email = $request->email;
        $registrar->contact_number = $request->contact_number;

        // Update password only if provided
        if ($request->filled('password')) {
            $registrar->password = bcrypt($request->password);
        }

        $registrar->save();

        return redirect()->route('registrar.manage.registrar')->with('success', 'Registrar updated successfully.');
    }


    public function destroy(Registrar $registrar)
    {
        $registrar->delete();
        return redirect()->route('registrar.manage.registrar')->with('success', 'Registrar deleted successfully.');
    }
}

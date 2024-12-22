<?php

use App\Http\Controllers\Student\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Student\Auth\RegisteredUserController;
use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Student registration and login routes
Route::prefix('student')->middleware('guest:student')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('student.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // If already logged in, redirect to the dashboard or show 404
    Route::get('login', function () {
        if (Auth::guard('student')->check()) {
            abort(404); // Show 404 if already logged in
        }
        return view('student.auth.login');
    })->name('student.login')->defaults('guard', 'student');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('student.login.post')->defaults('guard', 'student');
});

Route::prefix('student')->middleware('auth:student')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'studentDashboard'])->name('student.dashboard');
    
    // Update password route
    Route::post('/update-password', [DashboardController::class, 'updatePassword'])->name('student.updatePassword');
    
    // Logout route for student
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('student.logout')
        ->defaults('guard', 'student');
});

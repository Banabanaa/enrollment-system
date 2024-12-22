<?php

use App\Http\Controllers\Registrar\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Registrar\Auth\RegisteredUserController;
use App\Http\Controllers\Registrar\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Registrar registration and login routes
Route::prefix('registrar')->middleware('guest:registrar')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('registrar.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // If already logged in, redirect to the dashboard or show 404
    Route::get('login', function () {
        if (Auth::guard('registrar')->check()) {
            abort(404); // Show 404 if already logged in
        }
        return view('registrar.auth.login');
    })->name('registrar.login')->defaults('guard', 'registrar');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('registrar.login.post')->defaults('guard', 'registrar');
});

// Registrar authenticated routes
Route::prefix('registrar')->middleware('auth:registrar')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'registrarDashboard'])->name('registrar.dashboard');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('registrar.logout')->defaults('guard', 'registrar');
});

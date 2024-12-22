<?php

use App\Http\Controllers\Department\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Department\Auth\RegisteredUserController;
use App\Http\Controllers\Department\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Department registration and login routes
Route::prefix('department')->middleware('guest:department')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('department.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // If already logged in, redirect to the dashboard or show 404
    Route::get('login', function () {
        return view('department.auth.login');
    })->name('department.login')->defaults('guard', 'department');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('department.login.post')->defaults('guard', 'department');
});

// Department authenticated routes
Route::prefix('department')->middleware('auth:department')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'departmentDashboard'])->name('department.dashboard');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('department.logout')->defaults('guard', 'department');
});

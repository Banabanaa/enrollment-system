<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Registration and Login for Admin
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Pass 'admin' as the guard parameter to the create method
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->defaults('guard', 'admin');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.post')->defaults('guard', 'admin');
});

// Authenticated Admin Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout')->defaults('guard', 'admin');
});

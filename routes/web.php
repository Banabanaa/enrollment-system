<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RegistrarController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Registrar\RStudentController;
use App\Http\Controllers\Registrar\RRegistrarController;
use App\Http\Controllers\Department\DStudentController;
use App\Http\Controllers\Registrar\EnrollmentController;
use App\Http\Controllers\Department\DDepartmentController;
use App\Http\Controllers\Department\DEnrollmentController;
use App\Http\Controllers\Student\PhotoUploadController;
use App\Http\Controllers\Student\StudentCourseChecklistController;
use App\Http\Controllers\InstructorController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // Admin Management Routes
    Route::resource('manage/admin', AdminController::class)->except(['create', 'show'])->names([
        'index' => 'admin.manage.admin',
        'store' => 'admin.manage.store',
        'update' => 'admin.manage.update',
        'destroy' => 'admin.manage.destroy',
    ]);

    // Registrar Management Routes
    Route::resource('manage/registrar', RegistrarController::class)->except(['create', 'show'])->names([
        'index' => 'admin.manage.registrar',
        'store' => 'admin.manage.registrar.store',
        'update' => 'admin.manage.registrar.update',
        'destroy' => 'admin.manage.registrar.destroy',
    ]);

    // Department Management Routes
    Route::resource('manage/department', DepartmentController::class)->except(['create', 'show'])->names([
        'index' => 'admin.manage.department',
        'store' => 'admin.manage.department.store',
        'update' => 'admin.manage.department.update',
        'destroy' => 'admin.manage.department.destroy',
    ]);

    // Student Management Routes
    Route::resource('manage/student', StudentController::class)->except(['create', 'show'])->names([
        'index' => 'admin.manage.student',
        'store' => 'admin.manage.student.store',
        'update' => 'admin.manage.student.update',
        'destroy' => 'admin.manage.student.destroy',
    ]);

    // Add-ons Routes
    Route::name('admin.addons.')->group(function () {
        Route::view('addons/checklist', 'admin.addons.checklist')->name('checklist');
        Route::view('addons/masterlist', 'admin.addons.masterlist')->name('masterlist');
        Route::view('addons/privacy-policy', 'admin.addons.privacy-policy')->name('privacy-policy');
        Route::view('addons/terms', 'admin.addons.terms')->name('terms');
    });
});

// Registrar Routes
Route::prefix('registrar')->middleware('auth:registrar')->group(function () { 
    // Registrar Management Routes
     Route::resource('manage/registrar', RRegistrarController::class)->except(['create', 'show'])->names([
        'index' => 'registrar.manage.registrar',
        'store' => 'registrar.manage.registrar.store',
        'update' => 'registrar.manage.registrar.update',
        'destroy' => 'registrar.manage.registrar.destroy',
    ]);

    // Student Management Routes
    Route::resource('manage/student', RStudentController::class)->except(['create', 'show'])->names([
        'index' => 'registrar.manage.student',
        'store' => 'registrar.manage.student.store',
        'update' => 'registrar.manage.student.update',
        'destroy' => 'registrar.manage.student.destroy',
    ]);

    // Enrollment Management Routes
    Route::prefix('enrollment')->name('registrar.enrollment.')->group(function () {
        Route::get('regular', [EnrollmentController::class, 'regular'])->name('regular');
        Route::get('irregular', [EnrollmentController::class, 'irregular'])->name('irregular');
        Route::get('transferee', [EnrollmentController::class, 'transferee'])->name('transferee');
        Route::get('returnee', [EnrollmentController::class, 'returnee'])->name('returnee');
    });

    Route::name('registrar.addons.')->group(function () {
        Route::view('addons/checklist', 'registrar.addons.checklist')->name('checklist');
        Route::view('addons/masterlist', 'registrar.addons.masterlist')->name('masterlist');
        Route::view('addons/privacy-policy', 'registrar.addons.privacy-policy')->name('privacy-policy');
        Route::view('addons/terms', 'registrar.addons.terms')->name('terms');
    });
});

// Department Routes
Route::prefix('department')->middleware('auth:department')->group(function () {

    // Student Management Routes
    Route::resource('manage/student', DStudentController::class)->except(['create', 'show'])->names([
        'index' => 'department.manage.student',
        'store' => 'department.manage.student.store',
        'update' => 'department.manage.student.update',
        'destroy' => 'department.manage.student.destroy',
    ]);

    // Department Management Routes
    Route::resource('manage/department', DDepartmentController::class)->except(['create', 'show'])->names([
        'index' => 'department.manage.department',
        'store' => 'department.manage.department.store',
        'update' => 'department.manage.department.update',
        'destroy' => 'department.manage.department.destroy',
    ]);

    // Enrollment Management Routes
    Route::prefix('enrollment')->name('department.enrollment.')->group(function () {
        Route::get('regular', [DEnrollmentController::class, 'regular'])->name('regular');
        Route::get('irregular', [DEnrollmentController::class, 'irregular'])->name('irregular');
        Route::get('transferee', [DEnrollmentController::class, 'transferee'])->name('transferee');
        Route::get('returnee', [DEnrollmentController::class, 'returnee'])->name('returnee');
    });

    Route::name('department.addons.')->group(function () {
        Route::view('addons/checklist', 'department.addons.checklist')->name('checklist');
        Route::view('addons/masterlist', 'department.addons.masterlist')->name('masterlist');
        Route::view('addons/advising', 'department.addons.advising')->name('advising');
        Route::view('addons/privacy-policy', 'department.addons.privacy-policy')->name('privacy-policy');
        Route::view('addons/terms', 'deoartment.addons.terms')->name('terms');
    });
});

// Student Routes
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::name('student.view.')->group(function () {
        Route::get('view/checklist', [StudentCourseChecklistController::class, 'index'])->name('checklist');
        Route::view('view/enrollment', 'student.view.enrollment')->name('enrollment');
    });

    //Student Course Checklist Routes
    Route::resource('manage/student-course-checklist', StudentCourseChecklistController::class)->except(['create', 'show'])->names([
        'index' => 'student.manage.student-course-checklist',
        'store' => 'student.manage.student-course-checklist.store',
        'update' => 'student.manage.student-course-checklist.update',

    ]);

    Route::name('student.addons.')->group(function () {
        Route::view('addons/cor', 'student.addons.cor')->name('cor');
        Route::view('addons/privacy-policy', 'student.addons.privacy-policy')->name('privacy-policy');
        Route::view('addons/terms', 'student.addons.terms')->name('terms');
    });
    // Instructor Routes
    Route::get('/instructors', [InstructorController::class, 'showInstructor'])->name('instructors.show');
});
// Route::get('/student-grades', [StudentGradesController::class, 'showStudentGrades'])->name('student.grades');



// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Photo Upload
Route::get('/upload-photo/{studentId}', [PhotoUploadController::class, 'showUploadForm'])->name('upload.photo.form');
Route::post('/upload-photo', [PhotoUploadController::class, 'upload'])->name('upload.photo');


Route::get('/grades', [StudentController::class, 'showGrades'])->name('grades.show');



// Include Auth Routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';
require __DIR__ . '/registrar-auth.php';
require __DIR__ . '/student-auth.php';
require __DIR__ . '/department-auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminPasswordController;
use App\Http\Controllers\DashboardController;

// ==========================
// Authentication Routes
// ==========================

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// Protected Admin Routes
// ==========================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/followups/{id}/edit', [FollowupController::class, 'edit'])->name('followups.edit');

    Route::get('/basicinfo', [BasicInfoController::class, 'index'])->name('basicinfo');
    Route::get('/basic-info/{id}', [BasicInfoController::class, 'show'])->name('basicinfo.show');


    // Students
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students/deleteAll', [StudentController::class, 'deleteAll'])->name('students.deleteAll');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');

    // Results
    Route::get('/results', [ResultsController::class, 'index'])->name('results');

    // Attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');

    // Follow-ups
    Route::get('/followups', [FollowupController::class, 'index'])->name('followups');
    Route::get('/followups/{student}', [FollowupController::class, 'show'])->name('followups.show');
    Route::post('/followups', [FollowupController::class, 'store'])->name('followups.store');
    Route::delete('/followups/{id}', [FollowupController::class, 'destroy'])->name('followups.destroy');
    Route::put('/followups/{id}', [FollowupController::class, 'update'])->name('followups.update');

    // Report
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::post('/report/generate', [ReportController::class, 'generate'])->name('report.generate');
    Route::post('/reports/download-all', [ReportController::class, 'generateAllReports'])->name('report.generateAll');

    // Export
    Route::get('/export', [ExportController::class, 'index'])->name('export');
    Route::get('/export/download', [ExportController::class, 'download'])->name('export.download');

    Route::get('/password/reset', [AdminPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [AdminPasswordController::class, 'reset'])->name('password.update');


    // Credits page
    Route::get('/credits', function () {
        return view('admin.credits'); 
    })->name('credits');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
});

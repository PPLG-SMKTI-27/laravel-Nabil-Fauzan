<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* ===== DASHBOARD ===== */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'logActivity'])
  ->name('dashboard');

/* ===== AUTH REQUIRED ===== */
Route::middleware(['auth', 'logActivity'])->group(function () {

    /* === PROFILE (BREEZE DEFAULT) === */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /* === PORTFOLIO === */
    Route::get('/portfolio', function () {
        return view('pages.portfolio');
    })->name('portfolio');

    /* === PROJECTS === */
    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('projects');

    /* ===== TEACHER AREA (KHUSUS ROLE TEACHER) ===== */
    Route::get('/teacher', function () {
        return view('pages.teacher');
    })->middleware('isTeacher')->name('teacher');

    /* ===== RESTRICTED AREA (UMUR 18+) ===== */
    Route::get('/restricted', function () {
        return view('pages.restricted');
    })->middleware('checkAge')->name('restricted');
});

require __DIR__.'/auth.php';

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
})->middleware(['auth', 'verified'])->name('dashboard');

/* ===== AUTH REQUIRED ===== */
Route::middleware('auth')->group(function () {

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
});

require __DIR__.'/auth.php';

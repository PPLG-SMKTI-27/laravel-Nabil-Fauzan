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

    Route::get('/projects', [ProjectController::class, 'publicIndex'])
        ->name('projects');

    /* ===== ADMIN AREA (KHUSUS ROLE ADMIN) ===== */
    Route::get('/admin', function () {
        return view('pages.admin');
    })->middleware('isAdmin')->name('admin');

    Route::middleware('isAdmin')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    /* ===== RESTRICTED AREA (UMUR 18+) ===== */
    Route::get('/restricted', function () {
        return view('pages.restricted');
    })->middleware('checkAge')->name('restricted');
});

require __DIR__.'/auth.php';

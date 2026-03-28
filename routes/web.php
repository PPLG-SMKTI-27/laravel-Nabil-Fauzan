<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\User;
use App\Models\Project;

/* ===============================
   PUBLIC AREA
=================================*/

Route::get('/', function () {
    return view('welcome');
});

/* ===============================
   AUTH REQUIRED AREA
=================================*/

Route::middleware(['auth', 'verified', 'logActivity'])->group(function () {

    /* ===== DASHBOARD ===== */
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'myProjects' => Project::where('user_id', auth()->id())->count(),
        ]);
    })->name('dashboard');


    /* ===== PROFILE ===== */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /* ===== PUBLIC PROJECT LIST (LOGIN USER) ===== */
    Route::get('/projects', [ProjectController::class, 'publicIndex'])
        ->name('projects');

    /* ===== PORTFOLIO PAGE ===== */
    Route::get('/portfolio', function () {
        return view('pages.portfolio');
    })->name('portfolio');


    /* ===== PROJECT CRUD (USER + ADMIN) ===== */
    Route::prefix('dashboard')
        ->name('dashboard.')
        ->group(function () {

            Route::get('/projects', [ProjectController::class, 'index'])
                ->name('projects.index');

            Route::get('/projects/create', [ProjectController::class, 'create'])
                ->name('projects.create');

            Route::post('/projects', [ProjectController::class, 'store'])
                ->name('projects.store');

            Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
                ->name('projects.edit');

            Route::put('/projects/{project}', [ProjectController::class, 'update'])
                ->name('projects.update');

            Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
                ->name('projects.destroy');
        });


    /* ===== ADMIN DASHBOARD ONLY ===== */
    Route::middleware('isAdmin')->group(function () {

        Route::get('/admin', function () {
            return view('pages.admin', [
                'totalUsers'     => User::count(),
                'totalProjects'  => Project::count(),
                'latestUsers'    => User::latest()->take(5)->get(),
                'latestProjects' => Project::latest()->take(5)->get(),
            ]);
        })->name('admin');

    });

});

require __DIR__.'/auth.php';

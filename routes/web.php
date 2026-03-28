<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
        $user = auth()->user();
        $projectsQuery = Project::query();
        if ($user->role !== 'admin') {
            $projectsQuery->where('user_id', $user->id);
        }
        $myProjects = (clone $projectsQuery)->count();
        $recentProjects = (clone $projectsQuery)->latest()->take(5)->get();

        return view('dashboard', compact('myProjects', 'recentProjects'));
    })->name('dashboard');


    /* ===== PROFILE ===== */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /* ===== PUBLIC PROJECT LIST (LOGIN USER) ===== */
    Route::get('/projects', [ProjectController::class, 'publicIndex'])
        ->name('projects');

    /* ===== PORTFOLIO PAGE ===== */
    Route::get('/portfolio', [ProfileController::class, 'portfolio'])->name('portfolio');


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

        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    });

});

require __DIR__.'/auth.php';

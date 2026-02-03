<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;

Route::get('/login', function () {
    if (session('is_login')) {
        return redirect('/portfolio');
    }
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    if (
        $request->email === '24_nabilfauzan@student.smkti.net' &&
        $request->password === '123'
    ) {
        session(['is_login' => true]);
        return redirect('/portfolio');
    }

    return back()->with('error', 'Email atau password salah');
});

Route::get('/logout', function () {
    session()->forget('is_login');
    return redirect('/login');
});

Route::get('/', function () {
    if (!session('is_login')) {
        return redirect('/login');
    }
    return view('pages.portfolio');
});

Route::get('/portfolio', function () {
    if (!session('is_login')) {
        return redirect('/login');
    }
    return view('pages.portfolio');
});

Route::get('/index', function () {
    if (!session('is_login')) {
        return redirect('/login');
    }
    return view('pages.portfolio');
});

Route::get('/projects', function () {
    if (!session('is_login')) {
        return redirect('/login');
    }
    return app(ProjectController::class)->index();
});

Route::get('/product', function () {
    if (!session('is_login')) {
        return redirect('/login');
    }
    return app(ProductController::class)->index();
});

Route::get('/siswa/{nama}', function ($nama) {
    return "Nama siswa: " . $nama;
});

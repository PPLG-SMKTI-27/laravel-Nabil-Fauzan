<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/index', function () {
    return view('portfolio');
});

Route::get('/siswa/{nama}', function ($nama) {
    return "Nama siswa: " . $nama;
});

use App\Http\Controllers\ProductController;

Route::get('/product', [ProductController::class, 'index']);

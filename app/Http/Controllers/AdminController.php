<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalProjects' => Project::count(),
            'latestUsers' => User::latest()->take(5)->get(),
        ]);
    }
}
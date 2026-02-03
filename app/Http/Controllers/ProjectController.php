<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'title' => 'Proyek Toko Kue',
                'description' => 'Website pemesanan toko kue berbasis web menggunakan PHP dan MySQL.',
                'tech' => ['HTML', 'CSS', 'PHP', 'MySQL'],
                'link' => '#'
            ],
        ];

        return view('pages.projects', compact('projects'));
    }
}

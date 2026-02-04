<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        $data = [
            [
                'title' => 'Proyek Toko Kue',
                'description' => 'Website pemesanan toko kue berbasis web menggunakan PHP dan MySQL.',
                'tech' => ['HTML', 'CSS', 'PHP', 'MySQL'],
                'link' => '#',
                'projects' => $projects
            ],
        ];

        return view('pages.projects', compact('projects'));
    }
}

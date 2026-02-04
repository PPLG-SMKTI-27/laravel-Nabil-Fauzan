<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Proyek Toko Kue',
            'description' => 'Website pemesanan toko kue berbasis web menggunakan PHP dan MySQL.',
            'tech' => ['HTML', 'CSS', 'PHP', 'MySQL'],
            'link' => '#',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
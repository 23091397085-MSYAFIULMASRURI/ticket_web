<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run()
    {
        Team::create([
            'name' => 'M. Syafi\'ul Masruri',
            'role' => 'Full Stack Developer',
            'image' => 'images/syafiul.jpg', 
        ]);

        Team::create([
            'name' => 'Raditya Bani Ainur Ridho',
            'role' => 'UI/UX Designer',
            'image' => 'images/raditya.jpg',
        ]);

        Team::create([
            'name' => 'Atika Haniifatun Nisa\'',
            'role' => 'Content Creator',
            'image' => 'images/atika.jpg',
        ]);
    }
}

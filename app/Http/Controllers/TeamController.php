<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function about()
{
    $teams = Team::all(); // Mengambil semua data tim
    return view('about', compact('teams'));
}
}

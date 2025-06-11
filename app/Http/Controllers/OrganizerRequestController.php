<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerRequestController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $user->is_requesting_organizer = true;
        $user->save();

        return back()->with('success', 'Permintaan Anda telah dikirim ke admin.');
    }
}

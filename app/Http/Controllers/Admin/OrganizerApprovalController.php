<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class OrganizerApprovalController extends Controller
{
    public function approve(User $user)
    {
        $user->role = 'organizer';
        $user->is_requesting_organizer = false;
        $user->save();

        return redirect()->back()->with('success', 'Permintaan organizer disetujui.');
    }
}



<?php

// app/Http/Controllers/Admin/AdminDashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalEvents = Event::count();
        $totalTickets = Ticket::count();
        $organizers = User::where('role', 'organizer')->get();
        $pendingOrders = Order::with('user', 'event')->where('status', 'pending')->get();
        $organizerRequests = User::where('is_requesting_organizer', true)
            ->where('role', 'user')
            ->get();

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalEvents',
            'totalTickets',
            'organizers',
            'pendingOrders',
            'organizerRequests'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::with(['event', 'ticket'])
                    ->where('user_id', $user->id)
                    ->latest()
                    ->get();

        return view('user.dashboard', compact('orders'));
    }
}

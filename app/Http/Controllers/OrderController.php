<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);

        // Validasi stok
        if ($ticket->available_tickets < $request->quantity) {
            return back()->with('error', 'Tiket tidak mencukupi.');
        }

        // Hitung total harga
        $totalPrice = $ticket->price * $request->quantity;

        // Simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Update stok tiket
        $ticket->available_tickets -= $request->quantity;
        $ticket->save();

        return redirect()->route('orders.success', $order->id)->with('success', 'Tiket berhasil dipesan.');
    }

    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }
}

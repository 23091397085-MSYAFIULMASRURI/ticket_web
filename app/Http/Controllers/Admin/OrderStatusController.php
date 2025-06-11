<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index()
    {
        $orders = Order::with(['event', 'ticket', 'user'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // ✅ Tambahkan method update() di bawah ini
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:paid,pending,cancelled',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }

    // ✅ Tambahkan method cancel() jika belum ada
    public function cancel(Order $order)
    {
        $order->status = 'cancelled';
        $order->save();

        // Kembalikan stok tiket
        $order->ticket->available_tickets += $order->quantity;
        $order->ticket->save();

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dibatalkan.');
    }
}

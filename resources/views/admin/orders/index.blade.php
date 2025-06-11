@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Kelola Pesanan Tiket</h1>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-600/20 border border-green-500 text-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-gray-800 text-white rounded-lg shadow">
        <thead>
            <tr class="border-b border-gray-600 text-left">
                <th class="p-4">User</th>
                <th class="p-4">Event</th>
                <th class="p-4">Jumlah</th>
                <th class="p-4">Total Harga</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="p-4">{{ $order->user->name }}</td>
                    <td class="p-4">{{ $order->event->title }}</td>
                    <td class="p-4">{{ $order->quantity }}</td>
                    <td class="p-4">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="p-4">
                        @if($order->status == 'paid')
                            <span class="text-green-400 font-semibold">Dikonfirmasi</span>
                        @elseif($order->status == 'pending')
                            <span class="text-yellow-400 font-semibold">Menunggu</span>
                        @else
                            <span class="text-red-400 font-semibold">Dibatalkan</span>
                        @endif
                    </td>
                    <td class="p-4 flex space-x-2">
                        @if($order->status === 'pending')
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="paid">
                                <button class="text-green-400 hover:underline">Konfirmasi</button>
                            </form>
                            <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="text-red-400 hover:underline" type="submit">Batalkan</button>
                            </form>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr class="text-center text-gray-400">
                    <td colspan="7" class="p-4">Belum ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Tombol Kembali ke Dashboard --}}
<div class="mt-6">
    <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded">
        Kembali ke Dashboard
    </a>
</div>
@endsection

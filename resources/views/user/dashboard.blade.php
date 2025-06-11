@extends('layouts.main')

@section('title', 'Dashboard User')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard Saya</h1>

    <h2 class="text-xl font-semibold mb-4">Tiket dan Event yang Dibeli</h2>

    @if($orders->isEmpty())
        <p class="text-gray-500">Belum ada pembelian tiket.</p>
    @else
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-white shadow-md rounded-xl p-6 border">
                    {{-- EVENT DETAIL --}}
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $order->event->name }}</h3>
                    <p class="text-sm text-gray-600 mb-1"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->event->event_date)->format('d M Y') }}</p>
                    <p class="text-sm text-gray-600 mb-1"><strong>Lokasi:</strong> {{ $order->event->location }}</p>
                    <p class="text-sm text-gray-600 mb-4"><strong>Deskripsi:</strong> {{ $order->event->description }}</p>

                    {{-- TICKET DETAIL --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700"> 
                        <div>
                            <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
                            <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price, 2, ',', '.') }}</p>
                        </div>
                        <div>
                            <p><strong>Status:</strong> 
                                @if($order->status === 'paid')
                                    <span class="text-green-600 font-semibold">Selesai</span>
                                @elseif($order->status === 'pending')
                                    <span class="text-yellow-500 font-semibold">Menunggu Pembayaran</span>
                                @else
                                    <span class="text-red-500 font-semibold">Dibatalkan</span>
                                @endif
                            </p>
                            <p><strong>Tanggal Pembelian:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

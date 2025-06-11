@extends('layouts.main')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="max-w-xl mx-auto py-16 text-center">
    <h1 class="text-3xl font-bold mb-4 text-green-500">Pesanan Berhasil Dibuat</h1>

    <p class="text-lg text-blue-600 mb-2">Status: 
        @if ($order->status === 'paid')
            <span class="text-green-400 font-semibold">Sudah Dikonfirmasi</span>
        @elseif ($order->status === 'pending')
            <span class="text-yellow-400 font-semibold">Menunggu Konfirmasi Admin</span>
        @else
            <span class="text-red-400 font-semibold">Dibatalkan</span>
        @endif
    </p>

    <a href="{{ route('user.dashboard') }}" class="mt-6 inline-block text-blue-400 hover:underline">
        ← Kembali ke Dashboard Saya
    </a>
</div>
@endsection

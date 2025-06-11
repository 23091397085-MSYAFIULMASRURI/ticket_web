@extends('layouts.admin')

@section('title', 'Detail Tiket')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 text-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Detail Tiket</h2>

    <div class="space-y-4">
        <div>
            <h4 class="font-semibold text-gray-300">Event</h4>
            <p>{{ $ticket->event->title ?? 'Event Tidak Ditemukan' }}</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-300">Tipe Tiket</h4>
            <p>{{ $ticket->type }}</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-300">Harga</h4>
            <p>Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-300">Jumlah Tiket</h4>
            <p>{{ $ticket->quantity }}</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-300">Tiket Tersedia</h4>
            <p>{{ $ticket->available_tickets }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.tickets.index') }}" class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded shadow">Kembali</a>
    </div>
</div>
@endsection

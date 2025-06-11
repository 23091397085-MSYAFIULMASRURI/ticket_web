@extends('layouts.admin')

@section('title', 'Kelola Tiket')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Kelola Tiket</h1>
    <a href="{{ route('admin.tickets.create') }}" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-white">+ Tambah Tiket</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-gray-800 text-white rounded-lg shadow">
        <thead>
            <tr class="border-b border-gray-600 text-left">
                <th class="p-4">Event</th>
                <th class="p-4">Tipe</th>
                <th class="p-4">Harga</th>
                <th class="p-4">Jumlah</th>
                <th class="p-4">Tiket Tersedia</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="p-4">{{ $ticket->event->title ?? 'Tidak Ada Event' }}</td>
                    <td class="p-4">{{ $ticket->type }}</td>
                    <td class="p-4">Rp{{ number_format($ticket->price, 0, ',', '.') }}</td>
                    <td class="p-4">{{ $ticket->quantity }}</td>
                    <td class="p-4">{{ $ticket->available_tickets }}</td>
                    <td class="p-4 flex space-x-2">
                        <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="text-blue-400 hover:underline">Detail</a>
                        <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                        <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin hapus tiket ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
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

@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Tiket</h2>
        <a href="{{ route('tickets.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 transition">
            Tambah Tiket
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-left">
                    <th class="px-4 py-3">Event</th>
                    <th class="px-4 py-3">Tipe Tiket</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Tiket Tersedia</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="px-4 py-3">{{ $ticket->event->title }}</td>
                        <td class="px-4 py-3">{{ $ticket->type }}</td>
                        <td class="px-4 py-3">Rp{{ number_format($ticket->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $ticket->quantity }}</td>
                        <td class="px-4 py-3">{{ $ticket->available_tickets }}</td>
                        <td class="px-4 py-3 flex justify-center gap-2">
                            <a href="{{ route('tickets.edit', $ticket->id) }}" 
                               class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus tiket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">Belum ada tiket.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Kelola Event')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Kelola Event</h1>
    <a href="{{ route('admin.events.create') }}" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-white">+ Tambah Event</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-gray-800 text-white rounded-lg shadow">
        <thead>
            <tr class="border-b border-gray-600 text-left">
                <th class="p-4">Dibuat</th>
                <th class="p-4">Nama Event</th>
                <th class="p-4">Deskripsi</th>
                <th class="p-4">Tanggal</th>
                <th class="p-4">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $index => $event)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="p-4">{{ $event->organizer ? $event->organizer->name : 'Unknown' }}</td>
                    <td class="p-4">{{ $event->title }}</td>
                    <td class="p-4">{{ $event->description }}</td>
                    <td class="p-4">{{ $event->event_date }}</td>
                    <td class="p-4">{{ $event->location }}</td>
                    <td class="p-4 flex space-x-2">
                        <a href="{{ route('admin.events.show', $event->id) }}" class="text-blue-400 hover:underline">Detail</a>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
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

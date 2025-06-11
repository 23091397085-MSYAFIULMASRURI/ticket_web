@extends('layouts.admin')

@section('title', 'Detail Event')

@section('content')
<h1 class="text-2xl font-bold text-white mb-4">Detail Event</h1>

<div class="bg-gray-800 p-6 rounded-lg shadow text-white space-y-3">
    <p><strong>Nama:</strong> {{ $event->title }}</p>
    <p><strong>Deskripsi:</strong> {{ $event->description }}</p>
    <p><strong>Tanggal:</strong> {{ $event->event_date }}</p>
    <p><strong>Lokasi:</strong> {{ $event->location }}</p>
    <p><strong>Penyelenggara:</strong> {{ $event->organizer ? $event->organizer->name : 'Tidak Diketahui' }}</p>
</div>

<a href="{{ route('admin.events.index') }}" class="inline-block mt-4 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Kembali</a>
@endsection

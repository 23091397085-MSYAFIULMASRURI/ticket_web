@extends('layouts.main')

@section('title', 'Edit Event')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">Edit Event</h1>
    
    <form action="{{ route('event.update', $event->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT') <!-- Menambahkan method PUT untuk update -->

        <div class="mb-4">
            <label class="block text-gray-700">Judul Event</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" 
                class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded-lg">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Event</label>
            <input type="date" name="event_date" value="{{ old('event_date', $event->event_date) }}" 
                class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lokasi</label>
            <input type="text" name="location" value="{{ old('location', $event->location) }}" 
                class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('event-list') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update</button>
        </div>
    </form>
</div>
@endsection

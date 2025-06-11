@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<h1 class="text-2xl font-bold text-white mb-4">Edit Event</h1>

<form action="{{ route('admin.events.update', $event->id) }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow text-white">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="title" class="block mb-1">Nama Event</label>
        <input type="text" name="title" id="title" value="{{ $event->title }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block mb-1">Deskripsi</label>
        <textarea name="description" id="description" rows="3" class="w-full p-2 rounded bg-gray-700 text-white" required>{{ $event->description }}</textarea>
    </div>

    <div class="mb-4">
        <label for="event_date" class="block mb-1">Tanggal</label>
        <input type="date" name="event_date" id="event_date" value="{{ $event->event_date }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
    </div>

    <div class="mb-4">
        <label for="location" class="block mb-1">Lokasi</label>
        <input type="text" name="location" id="location" value="{{ $event->location }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
    </div>

    <div class="mb-4">
        <label for="organizer_id" class="block mb-1">Penyelenggara</label>
        <select name="organizer_id" id="organizer_id" class="w-full p-2 rounded bg-gray-700 text-white" required>
            @foreach ($organizers as $organizer)
                <option value="{{ $organizer->id }}" {{ $organizer->id == $event->organizer_id ? 'selected' : '' }}>
                    {{ $organizer->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-white">Update</button>

    <a href="{{ route('admin.users.index') }}" class="inline-block mt-4 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Kembali</a>
</form>
@endsection

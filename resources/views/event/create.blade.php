@extends('layouts.main')

@section('title', 'Create-Event')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">Tambah Event</h1>
    
    <form action="{{ route('event.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Judul Event</label>
            <input type="text" name="title" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded-lg"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Event</label>
            <input type="date" name="event_date" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lokasi</label>
            <input type="text" name="location" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan</button>
    </form>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Tambah Tiket')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-white">
        <h2 class="text-2xl font-semibold mb-4">Tambah Tiket Baru</h2>

        @if ($errors->any())
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.tickets.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="event_id" class="block font-medium">Event</label>
                <select name="event_id" id="event_id" class="w-full p-2 rounded bg-gray-900 border border-gray-600" required>
                    <option value="">-- Pilih Event --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="type" class="block font-medium">Tipe Tiket</label>
                <select name="type" id="type" class="w-full p-2 rounded bg-gray-900 border border-gray-600" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="Reguler">Reguler</option>
                    <option value="VIP">VIP</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block font-medium">Harga</label>
                <input type="number" name="price" id="price" class="w-full p-2 rounded bg-gray-900 border border-gray-600" required>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block font-medium">Jumlah Tiket</label>
                <input type="number" name="quantity" id="quantity" class="w-full p-2 rounded bg-gray-900 border border-gray-600" required>
            </div>

            <div class="mb-4">
                <label for="available_tickets" class="block font-medium">Tiket Tersedia</label>
                <input type="number" name="available_tickets" id="available_tickets" class="w-full p-2 rounded bg-gray-900 border border-gray-600" required>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-500">Simpan</button>
                <a href="{{ route('admin.tickets.index') }}" class="bg-gray-600 px-4 py-2 rounded text-white hover:bg-gray-500">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
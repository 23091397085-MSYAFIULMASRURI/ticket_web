@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Buat Tiket Baru</h2>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="event_id" class="block text-gray-700 font-medium">Event</label>
                <select name="event_id" id="event_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Event --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-medium">Tipe Tiket</label>
                <select name="type" id="type" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Tipe Tiket --</option>
                    <option value="Reguler">Reguler</option>
                    <option value="VIP">VIP</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium">Harga Tiket</label>
                <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" required>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-medium">Jumlah Tiket</label>
                <input type="number" name="quantity" id="quantity" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="1" required>
            </div>

            <div class="mb-4">
                <label for="available_tickets" class="block text-gray-700 font-medium">Tiket Tersedia</label>
                <input type="number" name="available_tickets" id="available_tickets" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="1" required>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition">
                    Simpan
                </button>
                <a href="{{ route('tickets.index') }}" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md shadow hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

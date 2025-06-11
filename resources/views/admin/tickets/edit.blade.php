@extends('layouts.admin')

@section('title', 'Edit Tiket')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8 text-white">
    <h2 class="text-2xl font-bold mb-6">Edit Tiket</h2>

    <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="event_id" class="block mb-1">Event</label>
            <select name="event_id" id="event_id" class="w-full bg-gray-900 text-white rounded px-3 py-2 border border-gray-600">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $ticket->event_id == $event->id ? 'selected' : '' }}>
                        {{ $event->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="type" class="block mb-1">Tipe Tiket</label>
            <select name="type" id="type" class="w-full bg-gray-900 text-white rounded px-3 py-2 border border-gray-600">
                <option value="Reguler" {{ $ticket->type == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                <option value="VIP" {{ $ticket->type == 'VIP' ? 'selected' : '' }}>VIP</option>
            </select>
        </div>

        <div>
            <label for="price" class="block mb-1">Harga</label>
            <input type="number" name="price" id="price" value="{{ $ticket->price }}" class="w-full bg-gray-900 text-white rounded px-3 py-2 border border-gray-600">
        </div>

        <div>
            <label for="quantity" class="block mb-1">Jumlah Tiket</label>
            <input type="number" name="quantity" id="quantity" value="{{ $ticket->quantity }}" class="w-full bg-gray-900 text-white rounded px-3 py-2 border border-gray-600">
        </div>

        <div>
            <label for="available_tickets" class="block mb-1">Tiket Tersedia</label>
            <input type="number" name="available_tickets" id="available_tickets" value="{{ $ticket->available_tickets }}" class="w-full bg-gray-900 text-white rounded px-3 py-2 border border-gray-600">
        </div>

        <div class="flex items-center gap-4 mt-4">
            <button type="submit" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-white">Update</button>
            <a href="{{ route('admin.tickets.index') }}" class="bg-gray-500 hover:bg-gray-400 px-4 py-2 rounded text-white">Kembali</a>
        </div>
    </form>
</div>
@endsection

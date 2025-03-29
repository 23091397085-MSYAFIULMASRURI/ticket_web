@extends('layouts.main')

@section('title', 'Detail Event')

@section('content')
    <div class="flex items-center justify-center min-h-screen p-6 bg-gradient-to-b from-indigo-500 to-purple-600 rounded-lg">
        <!-- Card Container -->
        <div
            class="bg-white/10 backdrop-blur-md p-6 rounded-lg shadow-xl border border-white/20 w-full max-w-lg text-center">
            <!-- Header dengan Gradient -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-500 p-4 rounded-t-lg">
                <h3 class="text-2xl font-bold text-white">{{ $event->title }}</h3>
            </div>

            <div class="p-4">
                <!-- Deskripsi Event -->
                <p class="text-gray-300 italic mb-4">"{{ $event->description }}"</p>

                <!-- Detail Tanggal & Lokasi -->
                <div class="text-gray-200 text-sm mb-3">
                    <p><strong>📅 Tanggal:</strong> {{ $event->event_date }}</p>
                    <p><strong>📍 Lokasi:</strong> {{ $event->location }}</p>
                </div>

                <!-- Nama Pembuat Event -->
                <div class="text-gray-200">
                    <p class="font-medium text-sm">
                        <strong>👤 Dibuat oleh:</strong>
                        {{ $event->organizer ? $event->organizer->name : 'Unknown' }}
                        @if ($event->organizer)
                            <span
                                class="text-sm font-semibold px-2 py-1 rounded-full 
                            @if ($event->organizer->role === 'admin') bg-red-500 
                            @elseif ($event->organizer->role === 'organizer') bg-orange-500 
                            @else bg-blue-500 @endif text-white">
                                {{ ucfirst($event->organizer->role) }}
                            </span>
                        @endif
                    </p>
                </div>

                <!-- Tombol -->
                <div class="mt-6 flex justify-center gap-4">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('event-list') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md shadow hover:bg-gray-400 transition font-poppins font-semibold">
                        Kembali
                    </a>



                    @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'organizer'))
                        <!-- Tombol Hapus -->
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition font-poppins font-semibold">
                                Hapus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 max-w-4xl mx-auto px-6">
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-16 text-center text-black">Tiket Tersedia</h2>

            @if ($event->tickets->isEmpty())
                <p class="text-gray-500 text-center">-Tidak ada tiket tersedia-</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($event->tickets as $ticket)
                        <div class="border border-gray-300 p-6 rounded-lg bg-white text-gray-800">
                            <h3
                                class="text-lg font-semibold text-center py-2 rounded-t-md 
                            @if ($ticket->type === 'VIP') bg-gradient-to-r from-indigo-600 to-purple-500 text-white p-4 
                            @else bg-gray-100 text-gray-800 @endif">
                                {{ $ticket->type }}
                            </h3>

                            <div class="m-5">

                                <p class="text-lg mt-2 text-center font-medium">Rp
                                    {{ number_format($ticket->price, 2, ',', '.') }}</p>
                                <p class="mt-1 text-center text-sm text-gray-600">Tersisa: {{ $ticket->available_tickets }}
                                    tiket</p>
                            </div>

                            @if ($ticket->available_tickets > 0)
                                <div class="flex justify-center mt-4">
                                    <a href=""
                                        class="inline-flex bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                                        Beli Tiket
                                    </a>
                                </div>
                            @else
                                <p class="text-red-500 text-center mt-2">Habis</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>


@endsection

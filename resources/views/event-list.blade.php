@extends('layouts.main')

@section('title', 'Events')

@section('content')
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white text-center py-20 px-6 rounded-lg">
        <div class="max-w-3xl mx-auto">
            @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'organizer'))
            <h1 class="text-4xl font-bold">Buat Event Menarik</h1>
            <p class="mt-4 text-lg">Atur event sesuai kebutuhanmu dan buat acara tak terlupakan!</p>
            @else
                <h1 class="text-4xl font-bold">Jelajahi Event Menarik</h1>
                <p class="mt-4 text-lg">Temukan event terbaik dan dapatkan tiketmu sekarang!</p>
            @endif
        </div>
    </section>

    <!-- Daftar Event -->
    <section class="py-16 max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Event Tersedia</h2>

        @if ($events->isEmpty())
            <p class="text-center text-gray-500">Tidak ada event yang tersedia saat ini</p>
        @else
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Event -->
                @foreach ($events as $event)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col items-center justify-between">
                        <div class="p-6 flex flex-col items-center justify-center">
                            <div class="mb-4">
                                <h3 class="text-2xl font-semibold text-center text-gray-800">{{ $event->title }}</h3>
                            </div>
                            <p class="text-gray-500 text-center text-base mb-2">"{{ $event->description }}"</p>
                            <p class="text-gray-600 text-center text-sm mb-2">
                                <strong>📅 Tanggal:</strong> {{ $event->event_date }}
                            </p>
                            <p class="text-gray-600 text-center text-sm mb-2">
                                <strong>📍 Lokasi:</strong> {{ $event->location }}
                            </p>

                            <!-- Nama Pembuat Event -->
                            <p class="text-gray-600 text-center text-sm">
                                <strong>👤 Dibuat oleh:</strong>
                                {{ $event->organizer ? $event->organizer->name : 'Unknown' }}

                                @if ($event->organizer)
                                    <span
                                        class="text-sm font-semibold px-2 py-1 rounded-full mt-2 inline-block
                                @if ($event->organizer->role === 'admin') bg-red-500 
                                @elseif ($event->organizer->role === 'organizer') bg-orange-500 
                                @else bg-blue-500 @endif text-white">
                                        {{ ucfirst($event->organizer->role) }}
                                    </span>
                                @endif
                            </p>



                        </div>

                        <!-- Tombol Detail & Edit -->
                        <div class="p-6 flex justify-center space-x-4">

                            <!-- Tombol Detail -->
                            @if (auth()->check())
                                <a href="{{ route('event.show', $event->id) }}"
                                    class="inline-flex px-3 py-2 border-2 border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition text-center">
                                    Detail
                                </a>
                            @else
                                <a href="{{ route('register') }}"
                                    class="inline-flex px-3 py-2 bg-gray-800 text-gray-300 rounded hover:bg-gray-700 hover:text-white transition text-center">
                                    Daftar untuk Lihat Detail
                                </a>
                            @endif
 

                        @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'organizer'))
                            <!-- Tombol Edit -->
                            <a href="{{ route('event.edit', $event->id) }}"
                                class="inline-flex px-3 py-2 border-2 border-yellow-500 text-yellow-500 rounded hover:bg-yellow-500 hover:text-white transition">
                                Edit
                            </a>
                        @endif


                    </div>

            </div>
        @endforeach
        </div>
        @endif

        <div class="flex justify-center mt-8">
            @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'organizer'))
                <a href="{{ route('event.create') }}"
                    class="bg-blue-600 text-white px-8 py-4 mt-20 rounded hover:bg-blue-700">Buat Event</a>
            @endif
        </div>
    </section>

@endsection

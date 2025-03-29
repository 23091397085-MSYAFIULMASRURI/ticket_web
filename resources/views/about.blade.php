@extends('layouts.main')

@section('title', 'About')

@section('content')
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white text-center py-20 px-6 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold">Tentang Kami</h1>
            <p class="mt-4 text-lg">Kami adalah tim yang berkomitmen untuk membantu penyelenggara event dalam mengelola acara
                serta menjual tiket secara digital dengan mudah.</p>
        </div>
    </section>

    <!-- Tim Kami -->
    <section class="py-16 text-center">
        <h2 class="text-3xl font-bold mb-6">Tim Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            
            @foreach ($teams as $member)
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                    class="w-32 h-32 mx-auto rounded-full object-cover">
                <h3 class="text-xl font-semibold mt-4">{{ $member->name }}</h3>
                <p class="text-gray-600">{{ $member->role }}</p>
            </div>
        @endforeach

        </div>
    </section>
@endsection

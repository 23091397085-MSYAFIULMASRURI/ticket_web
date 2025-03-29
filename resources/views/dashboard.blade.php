@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        
        <!-- Selamat Datang -->
        <p class="text-gray-700">Hai, {{ Auth::user()->name }}! Selamat datang di Event Management.</p>

        <!-- Daftar Event yang Diikuti -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">Event yang Kamu Ikuti</h2>
            <div class="bg-gray-100 p-4 rounded-md">
                <ul>
                    <li>- Event A (12 Desember 2024)</li>
                    <li>- Event B (5 Januari 2025)</li>
                    <li>- Event C (20 Februari 2025)</li>
                </ul>
            </div>
        </div>

        <!-- Rekomendasi Event -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">Rekomendasi Event</h2>
            <div class="bg-gray-100 p-4 rounded-md">
                <ul>
                    <li>- Workshop Web Development</li>
                    <li>- Seminar AI & Machine Learning</li>
                    <li>- Hackathon Nasional</li>
                </ul>
            </div>
        </div>

        <!-- Tombol Logout -->
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
           class="mt-4 inline-block bg-red-500 text-white py-2 px-4 rounded">
           Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
@endsection

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Profile</h1>
        
        <div class="flex items-center space-x-4 mb-6">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" 
                alt="Profile Picture" class="w-16 h-16 rounded-full border">
            <div>
                <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Nama</label>
            <input type="text" class="w-full p-2 border rounded-md" value="{{ Auth::user()->name }}" disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Email</label>
            <input type="email" class="w-full p-2 border rounded-md" value="{{ Auth::user()->email }}" disabled>
        </div>

        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Detail Pengguna')

@section('content')
<h1 class="text-2xl font-bold text-white mb-4">Detail Pengguna</h1>

<div class="bg-gray-800 p-6 rounded-lg shadow text-white space-y-3">
    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> <span class="capitalize">{{ $user->role }}</span></p>
</div>

<a href="{{ route('admin.users.index') }}" class="inline-block mt-4 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Kembali</a>
@endsection

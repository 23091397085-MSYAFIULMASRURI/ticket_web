@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
<h1 class="text-2xl font-bold text-white mb-4">Tambah Pengguna</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow text-white">
    @csrf
    <div class="mb-4">
        <label for="name" class="block mb-1">Nama</label>
        <input type="text" name="name" id="name" class="w-full p-2 rounded bg-gray-700 text-white" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block mb-1">Email</label>
        <input type="email" name="email" id="email" class="w-full p-2 rounded bg-gray-700 text-white" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block mb-1">Password</label>
        <input type="password" name="password" id="password" class="w-full p-2 rounded bg-gray-700 text-white" required>
    </div>
    <div class="mb-4">
        <label for="role" class="block mb-1">Role</label>
        <select name="role" id="role" class="w-full p-2 rounded bg-gray-700 text-white" required>
            <option value="user">User</option>
            <option value="organizer">Organizer</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-white">Simpan</button>
    <a href="{{ route('admin.users.index') }}" class="inline-block mt-4 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Kembali</a>
</form>
@endsection

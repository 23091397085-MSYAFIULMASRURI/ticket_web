@extends('layouts.admin')

@section('title', 'Kelola Pengguna')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Kelola Pengguna</h1>
    <a href="{{ route('admin.users.create') }}" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-white">+ Tambah Pengguna</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-gray-800 text-white rounded-lg shadow">
        <thead>
            <tr class="border-b border-gray-600 text-left">
                <th class="p-4">#</th>
                <th class="p-4">Nama</th>
                <th class="p-4">Email</th>
                <th class="p-4">Role</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="p-4">{{ $index + 1 }}</td>
                    <td class="p-4">{{ $user->name }}</td>
                    <td class="p-4">{{ $user->email }}</td>
                    <td class="p-4 capitalize">{{ $user->role }}</td>
                    <td class="p-4 flex space-x-2">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-400 hover:underline">Detail</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Tombol Kembali ke Dashboard --}}
<div class="mt-6">
    <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded">
        Kembali ke Dashboard
    </a>
</div>

@endsection

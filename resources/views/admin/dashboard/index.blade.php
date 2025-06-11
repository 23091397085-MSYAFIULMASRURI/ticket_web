@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="p-6 bg-gray-900 min-h-screen text-white">
    <h1 class="text-3xl font-bold mb-6 text-white">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 bg-gray-800 rounded-2xl shadow-lg">
            <h2 class="text-gray-400">Total Users</h2>
            <p class="text-4xl font-bold text-red-600">{{ $totalUsers }}</p>
        </div>
        <div class="p-6 bg-gray-800 rounded-2xl shadow-lg">
            <h2 class="text-gray-400">Total Events</h2>
            <p class="text-4xl font-bold text-red-600">{{ $totalEvents }}</p>
        </div>
        <div class="p-6 bg-gray-800 rounded-2xl shadow-lg">
            <h2 class="text-gray-400">Total Tickets</h2>
            <p class="text-4xl font-bold text-red-600">{{ $totalTickets }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        <a href="{{ route('admin.users.index') }}" class="block p-6 bg-red-600 hover:bg-red-500 text-white text-lg font-semibold rounded-xl shadow text-center transition">Kelola Pengguna</a>
        <a href="{{ route('admin.events.index') }}" class="block p-6 bg-red-600 hover:bg-red-500 text-white text-lg font-semibold rounded-xl shadow text-center transition">Kelola Event</a>
        <a href="{{ route('admin.tickets.index') }}" class="block p-6 bg-red-600 hover:bg-red-500 text-white text-lg font-semibold rounded-xl shadow text-center transition">Kelola Tiket</a>
        <a href="{{ route('admin.reports.index') }}" class="block p-6 bg-red-600 hover:bg-red-500 text-white text-lg font-semibold rounded-xl shadow text-center transition">Laporan & Statistik</a>
        <a href="{{ route('admin.orders.index') }}" class="block p-6 bg-red-600 hover:bg-red-500 text-white text-lg font-semibold rounded-xl shadow text-center transition">Daftar Pesanan</a>
    </div>

    <h2 id="organizer-list" class="text-2xl font-bold mb-4 text-white">Daftar Organizer</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-xl text-white">
            <thead>
                <tr class="text-left border-b border-gray-600">
                    <th class="p-4">#</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizers as $index => $organizer)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="p-4">{{ $index + 1 }}</td>
                        <td class="p-4">{{ $organizer->name }}</td>
                        <td class="p-4">{{ $organizer->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<h2 class="text-2xl font-bold mb-4 text-white mt-8">Permintaan Menjadi Organizer</h2>
<div class="overflow-x-auto">
    <table class="min-w-full bg-gray-800 text-white rounded-xl">
        <thead>
            <tr class="text-left border-b border-gray-600">
                <th class="p-4">#</th>
                <th class="p-4">Nama</th>
                <th class="p-4">Email</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizerRequests as $index => $user)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="p-4">{{ $index + 1 }}</td>
                    <td class="p-4">{{ $user->name }}</td>
                    <td class="p-4">{{ $user->email }}</td>
                    <td class="p-4">
                        <form action="{{ route('admin.organizer.approve', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded text-white">
                                Setujui
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
@endsection

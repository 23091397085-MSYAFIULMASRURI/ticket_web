<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Alpine.js (tambahkan ini!) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-red-600 font-bold text-xl">AdminPanel</a>
            <ul class="flex space-x-6 text-white">
                <li><a href="{{ route('admin.users.index') }}" class="hover:text-red-600">Pengguna</a></li>
                <li><a href="{{ route('admin.events.index') }}" class="hover:text-red-600">Event</a></li>
                <li><a href="{{ route('admin.tickets.index') }}" class="hover:text-red-600">Tiket</a></li>
                <li><a href="{{ route('admin.reports.index') }}" class="hover:text-red-600">Laporan</a></li>
                <li><a href="{{ route('admin.orders.index') }}" class="hover:text-red-600">Pesanan</a></li>
            </ul>
<div class="relative" x-data="{ open: false }">
    <!-- Trigger -->
    <button @click="open = !open"
            class="flex items-center px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
        Menu
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="open"
         @click.away="open = false"
         x-transition
         class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50"
         style="display: none;">
        <a href="{{ url('/') }}"
           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            Beranda
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100">
                Logout
            </button>
        </form>
    </div>
</div>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 text-center text-gray-400 text-sm">
        &copy; {{ date('Y') }} Admin Ticket System. All rights reserved.
    </footer>

    @yield('scripts')
</body>
</html>

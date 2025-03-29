@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <!-- Hero Section -->
    <section class="relative bg-blue-600 text-white text-center py-20 px-6 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold">Kelola Event, Jual Atau Beli Tiket Digital</h1>
            <p class="mt-4 text-lg">
                Solusi terbaik untuk menyelenggarakan event dan menjual tiket secara online dengan mudah.
            </p>
            
            <div class="mt-6 flex justify-center gap-4">
                @if (Auth::check())
                @if (Auth::user()->role === 'organizer')
                    <!-- Jika sudah login sebagai Organizer -->
                    <a href=""
                        class="bg-orange-500 px-6 py-3 rounded-full text-lg font-semibold shadow-lg text-white transition hover:bg-orange-600">
                        Dashboard Organizer
                    </a>
                @elseif (Auth::user()->role === 'admin')
                    <!-- Jika sudah login sebagai Admin -->
                    <a href=""
                        class="bg-red-500 px-6 py-3 rounded-full text-lg font-semibold shadow-lg text-white transition hover:bg-red-600">
                        Dashboard Admin
                    </a>
                @else
                    <!-- Jika user biasa login -->
                    <a href=""
                        class="bg-transparent px-6 py-3 rounded-full text-lg text-white font-semibold shadow-lg border-2 border-white transition hover:bg-white hover:text-blue-600">
                        Dashboard User
                    </a>
                @endif
            @else
                <!-- Jika belum login -->
                <div class="mt-6 flex justify-center gap-4">
                    <a href=""
                        class="bg-orange-500 px-6 py-3 rounded-full text-lg font-semibold shadow-lg text-white transition hover:bg-orange-600">
                        Daftar Sebagai Organizer
                    </a>
            
                    <a href=""
                        class="bg-transparent px-6 py-3 rounded-full text-lg text-white font-semibold shadow-lg border-2 border-white transition hover:bg-white hover:text-blue-600">
                        Daftar Sebagai User
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Fitur Utama -->
    <section class="py-16 text-center">
        <h2 class="text-3xl font-bold mb-6">Fitur Utama</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <h3 class="text-xl font-semibold">📅 Buat & Kelola Event</h3>
                <p class="mt-2 text-gray-600">Atur event dengan berbagai kategori secara mudah.</p>
            </div>
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <h3 class="text-xl font-semibold">🎟 Jual Tiket Online</h3>
                <p class="mt-2 text-gray-600">Peserta bisa membeli tiket dengan aman dan cepat.</p>
            </div>
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <h3 class="text-xl font-semibold">📊 Laporan & Analitik</h3>
                <p class="mt-2 text-gray-600">Pantau jumlah peserta dan transaksi tiket.</p>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-16 text-center">
        <h2 class="text-3xl font-bold mb-6">Apa Kata Mereka?</h2>
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <p class="text-gray-600">"Platform ini sangat membantu dalam mengelola event saya! Proses penjualan tiket
                    jadi lebih mudah."</p>
                <h3 class="mt-4 font-semibold">- Andi, Penyelenggara Event</h3>
            </div>
        </div>
    </section>

    <!-- CTA Akhir -->
    <section class="py-16 bg-blue-600 text-white text-center rounded-lg">
        <h2 class="text-3xl font-bold">Cari Event Seru?</h2>
        <p class="mt-2 text-lg">Lihat Event Terbaru dan Bersiap untuk Pengalaman Tak Terlupakan.</p>

            <a href="{{ route('event-list') }}"
                class="mt-4 inline-block bg-orange-500 px-6 py-3 rounded-full text-lg font-semibold shadow-lg hover:bg-orange-600 transition">
                Liat Event Sekarang
            </a>
    </section>

@endsection

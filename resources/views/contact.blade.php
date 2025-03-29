@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white text-center py-20 px-6 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold">Hubungi Kami</h1>
            <p class="mt-4 text-lg">Ada pertanyaan? Kirim pesan kepada kami, dan kami akan segera merespons!</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12">
            
            <!-- Formulir Kontak -->
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Kirim Pesan</h2>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                        <input type="text" placeholder="Masukkan nama" class="w-full p-3 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" placeholder="Masukkan email" class="w-full p-3 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                        <textarea rows="5" placeholder="Tulis pesan Anda" class="w-full p-3 border border-gray-300 rounded"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700">Kirim Pesan</button>
                </form>
            </div>

            <!-- Informasi Kontak -->
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Informasi Kontak</h2>
                <p class="text-gray-700">Silakan hubungi kami melalui informasi di bawah ini:</p>
                <div class="mt-4">
                    <p class="text-gray-800"><strong>📍 Alamat:</strong>Jl. Ketintang, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231</p>
                    <p class="text-gray-800 mt-2"><strong>📧 Email:</strong> ticketingevent@gmail.com</p>
                    <p class="text-gray-800 mt-2"><strong>📞 Telepon:</strong> +62 895-3970-46845</p>
                </div>
            </div>

        </div>
    </section>
@endsection
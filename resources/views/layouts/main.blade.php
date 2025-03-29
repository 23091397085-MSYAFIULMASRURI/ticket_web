<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-gray-100">

    {{-- Navbar --}}
    <div class="fixed top-0 left-0 w-full z-50 bg-white shadow">
        @include('partials.navbar')
    </div>

    <div class="min-h-screen flex flex-col justify-between">
        <!-- Konten Utama -->
        <main class="container mx-auto px-4 py-40 flex-grow  font-poppins font-semibold">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.footer')
</body>

</html>

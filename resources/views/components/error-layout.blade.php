<!-- resources/views/components/error-layout.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Terjadi Kesalahan' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-800 via-gray-900 to-black text-white min-h-screen flex flex-col">

    {{-- Navbar --}}
    @if (View::hasSection('navbar'))
        <header class="bg-gray-950 bg-opacity-80 shadow-md sticky top-0 z-50">
            @yield('navbar')
        </header>
    @endif

    <main class="flex-grow flex items-center justify-center px-6 py-12 animate-fade-in">
        <section
            class="flex flex-col md:flex-row items-center gap-8 bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-2xl p-10 shadow-2xl max-w-4xl w-full">
            {{-- Gambar SVG Kartun di Kiri --}}
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset('img/error.png') }}" alt="Ilustrasi Error" class="w-64 h-auto">
            </div>

            {{-- Konten Error --}}
            <div class="text-center md:text-left w-full md:w-1/2">
                {{ $slot }}
            </div>
        </section>
    </main>

    {{-- Footer --}}
    <footer class="text-center text-gray-500 text-sm py-4">
        &copy; {{ date('Y') }} FastDiamond. All rights reserved.
    </footer>

</body>

</html>

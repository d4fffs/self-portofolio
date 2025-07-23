<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fast Diamond') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">
    <div class="flex">
        @include('layouts.navigation')

        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>
</html>
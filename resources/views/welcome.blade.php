<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FastDiamond</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212;
            color: white;
        }

        .gradient-text {
            background: linear-gradient(90deg, #00B4D8, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feature-card,
        .testimonial-card,
        .animate-fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.7s ease;
        }

        .feature-card.visible,
        .testimonial-card.visible,
        .animate-fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-card:hover {
            transform: translateY(-5px) !important;
        }

        .testimonial-card::before {
            content: "\201C";
            position: absolute;
            top: -20px;
            left: -10px;
            font-size: 4rem;
            color: #3b3b3b;
            z-index: 0;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">

    <header class="w-full max-w-6xl mx-auto px-6 py-6 text-sm">
        @if (Route::has('login'))
            <nav class="flex justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-1.5 text-white border border-[#ccc] rounded hover:border-blue-400 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-1.5 text-white border border-transparent hover:border-gray-300 rounded transition">Log
                        in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-1.5 text-white border border-transparent hover:border-gray-300 rounded transition">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <section class="flex items-center justify-center px-6 py-20">
        <div class="max-w-4xl text-center animate-fade-up">
            <h1 class="text-5xl font-extrabold mb-4 gradient-text">Welcome to FastDiamond</h1>
            <p class="text-lg text-gray-400 mb-8">Platform terbaik untuk solusi Anda yang cepat dan mudah.</p>
            <a href="{{ route('register') }}">
                <button
                    class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">Get
                    Started</button>
            </a>
        </div>
    </section>

    <section class="bg-[#1F1F1F] py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Fitur</h2>
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-[#2A2A2A] p-8 rounded-xl shadow-md feature-card">
                    <div class="mb-4 text-blue-400">
                        <svg class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L15 12l-5.25-5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Mudah Digunakan</h3>
                    <p class="text-gray-300 text-center">Desain intuitif, tanpa perlu belajar lama.</p>
                </div>
                <div class="bg-[#2A2A2A] p-8 rounded-xl shadow-md feature-card">
                    <div class="mb-4 text-green-400">
                        <svg class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Terpercaya</h3>
                    <p class="text-gray-300 text-center">Teruji dan dipercaya banyak pengguna.</p>
                </div>
                <div class="bg-[#2A2A2A] p-8 rounded-xl shadow-md feature-card">
                    <div class="mb-4 text-cyan-400">
                        <svg class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Mudah Disesuaikan</h3>
                    <p class="text-gray-300 text-center">Sesuaikan pengalaman sesuai kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka</h2>
        <div class="grid gap-10 md:grid-cols-3">
            <blockquote class="bg-[#1F1F1F] p-8 rounded-lg shadow relative testimonial-card">
                <p class="italic text-gray-300 mb-4 relative z-10">
                    "Produk ini benar-benar mengubah cara saya bekerja. Sederhana, kuat, dan andal!"
                </p>
                <footer class="text-right font-semibold text-blue-400 relative z-10">— Alex Johnson</footer>
            </blockquote>
            <blockquote class="bg-[#1F1F1F] p-8 rounded-lg shadow relative testimonial-card">
                <p class="italic text-gray-300 mb-4 relative z-10">
                    "Sangat saya rekomendasikan! Opsi kustomisasinya cocok banget dengan alur kerja saya."
                </p>
                <footer class="text-right font-semibold text-green-400 relative z-10">— Maria Garcia</footer>
            </blockquote>
            <blockquote class="bg-[#1F1F1F] p-8 rounded-lg shadow relative testimonial-card">
                <p class="italic text-gray-300 mb-4 relative z-10">
                    "Support-nya luar biasa dan hasilnya melebihi harapan saya!"
                </p>
                <footer class="text-right font-semibold text-cyan-400 relative z-10">— Liam Smith</footer>
            </blockquote>
        </div>
    </section>

    <footer class="bg-[#0D0D0D] py-6 text-center text-gray-500 text-sm border-t border-gray-800">
        &copy; 2024 FastDiamond. All rights reserved.
    </footer>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, {
            threshold: 0.15
        });

        document.querySelectorAll('.feature-card, .testimonial-card, .animate-fade-up').forEach((el, i) => {
            el.style.transitionDelay = `${i * 100}ms`;
            observer.observe(el);
        });
    </script>

</body>

</html>

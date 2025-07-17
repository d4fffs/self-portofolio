<x-app-layout>
    <section class="px-4 md:px-8 lg:px-16 py-12 mt-6">
        @php
            $hour = (int) now()->format('H');
            $greeting = match (true) {
                $hour >= 5 && $hour < 11 => 'Selamat Pagi',
                $hour >= 11 && $hour < 15 => 'Selamat Siang',
                $hour >= 15 && $hour < 18 => 'Selamat Sore',
                default => 'Selamat Malam',
            };
        @endphp

        <h1 class="text-2xl font-semibold text-white mb-4">
            {{ $greeting }}, {{ Auth::user()->name }}
        </h1>

        <h2 class="text-3xl font-bold text-white mb-8">Semua Produk</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
            @forelse ($products as $product)
                @include('components.product-card', ['product' => $product])
            @empty
                <p class="text-white col-span-full">Belum ada produk tersedia.</p>
            @endforelse
        </div>
    </section>

    {{-- SweetAlert Section --}}
    @if (session('success') || session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: '{{ session('success') ? 'success' : 'error' }}',
                    title: '{{ session('success') ?? session('error') }}',
                    confirmButtonText: 'OK',
                    background: '#1F1F1F',
                    color: '#fff',
                });
            });
        </script>
    @endif
</x-app-layout>
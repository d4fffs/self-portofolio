<x-app-layout>
    <section class="moving-gradient px-4 md:px-8 lg:px-16 py-12">
        <h2 class="text-3xl font-bold text-white mb-8">Semua Produk</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
            @forelse ($products as $product)
                @include('components.product-card', ['product' => $product])
            @empty
                <p class="text-white col-span-full">Belum ada produk tersedia.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
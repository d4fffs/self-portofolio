@props(['product'])

<div class="relative rounded-xl overflow-hidden aspect-[3/4] group cursor-pointer transition duration-300 shadow-md">
    <!-- Gambar Produk -->
    <img 
        src="{{ $product->image ? asset('img/products/' . $product->image) : asset('img/default.png') }}"
        alt="{{ $product->name }}"
        class="w-full h-full object-cover transition duration-300 transform opacity-60 group-hover:opacity-100 group-hover:scale-105"
    >

    <!-- Overlay Info -->
    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-0 text-white p-4 transition duration-300 group-hover:bg-opacity-80">
        <h3 class="text-xl font-bold mb-1 group-hover:text-yellow-400 transition">
            {{ $product->name }}
        </h3>
        <p class="group-hover:text-gray-200 transition">
            {{ $product->detail }}
        </p>
    </div>
</div>
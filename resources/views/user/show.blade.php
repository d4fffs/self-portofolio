<x-app-layout>
    <section class="px-4 md:px-8 lg:px-16 py-12 text-white mt-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

            <!-- DETAIL PRODUK -->
            <div class="bg-gray-800/70 p-6 rounded-lg shadow-lg">
                <img src="{{ $product->image ? asset('img/products/' . $product->image) : asset('img/default.png') }}"
                    alt="{{ $product->name }}" class="w-64 h-64 object-cover rounded-lg shadow mb-6 mx-auto" />
                <h2 class="text-3xl font-bold mb-2">{{ $product->name }}</h2>
                <p class="text-xl font-semibold text-green-400 mb-2">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </p>
                <p class="text-md text-gray-300 mb-4">{{ $product->detail }}</p>
                <p class="text-sm text-gray-400">Stok tersedia: {{ $product->stok }}</p>
            </div>

            <!-- FORM PEMBELIAN -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Beli Produk</h3>

                <form method="POST" action="{{ route('user.products.purchase', $product->id) }}" id="purchase-form" novalidate>
                    @csrf

                    @if ($product->stok < 50)
                        <p class="text-red-400 text-sm font-semibold mb-2">
                            Stok terbatas! Segera beli sebelum kehabisan.
                        </p>
                    @endif

                    <div class="mb-4">
                        <label for="quantity" class="block text-sm mb-1">Jumlah:</label>
                        <input type="number" name="quantity" id="quantity" min="1"
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none">
                    </div>

                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-5 py-2 rounded-lg text-white font-semibold">
                        Beli Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Swal Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const form = document.getElementById('purchase-form');
        const quantityInput = document.getElementById('quantity');
        const maxStock = {{ $product->stok }};

        form.addEventListener('submit', function (e) {
            const qty = parseInt(quantityInput.value);

            if (isNaN(qty) || qty < 1) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Jumlah tidak valid',
                    text: 'Silakan masukkan jumlah minimal 1.',
                });
                return;
            }

            if (qty > maxStock) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Jumlah melebihi stok',
                    text: `Stok tersedia hanya ${maxStock} unit.`,
                });
            }
        });
    </script>
</x-app-layout>
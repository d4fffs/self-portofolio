<x-app-layout>
    <section class="px-4 md:px-8 lg:px-16 py-12 text-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <!-- DETAIL PRODUK -->
            <div>
                <img src="{{ $product->image ? asset('img/products/' . $product->image) : asset('img/default.png') }}"
                    alt="{{ $product->name }}" class="w-64 h-64 object-cover rounded-lg shadow-lg mb-6 mx-auto" />
                <h2 class="text-3xl font-bold mb-2">{{ $product->name }}</h2>
                <p class="text-xl font-semibold text-green-400 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <p class="text-md text-gray-300 mb-4">{{ $product->detail }}</p>
                <p class="text-sm text-gray-400">Stok tersedia: {{ $product->stok }}</p>
            </div>

            <!-- FORM PEMBELIAN -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Simulasi Pembelian</h3>

                <form method="POST" action="{{ route('user.products.purchase', $product->id) }}" id="purchase-form">
                    @csrf
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm mb-1">Jumlah:</label>
                        <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->stok }}"
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none" required>
                    </div>

                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-5 py-2 rounded-lg text-white font-semibold">
                        Beli Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Pembelian Berhasil',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#10B981',
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#EF4444',
                });
            });
        </script>
    @endif
</x-app-layout>

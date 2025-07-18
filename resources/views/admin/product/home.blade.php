<x-app-layout>
    <div class="py-8" x-data="{ openModal: false, deleteUrl: '', deleteForm: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex items-center justify-between mb-4 px-6 py-4 mt-4 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-white">Tabel Produk</h3>
                <a href="{{ route('admin/products/create') }}">
                    <button
                        class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Tambah Produk
                    </button>
                </a>
            </div>


            <!-- Tabel Produk -->
            <div class="bg-gray-800 shadow rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-300">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                        <tr>
                            <th class="px-6 py-3">No.</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Detail</th>
                            <th class="px-6 py-3">Harga</th>
                            <th class="px-6 py-3">Stok</th>
                            <th class="px-6 py-3">Gambar</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="border-t border-gray-700 hover:bg-gray-700 transition duration-150">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $product->name }}</td>
                                <td class="px-6 py-4">{{ $product->detail }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    @if ($product->stok == 0)
                                        <span class="text-red-500 font-semibold">Habis</span>
                                    @else
                                        {{ $product->stok }}
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    @if ($product->image)
                                        <img src="{{ asset('img/products/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="w-16 h-16 object-cover rounded-md border border-gray-600">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('admin/products/edit', ['id' => $product->id]) }}">
                                            <button
                                                class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2">
                                                Edit
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ route('admin/products/delete', $product->id) }}"
                                            x-ref="form{{ $product->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                @click="Swal.fire({
                                                    title: 'Yakin ingin menghapus?',
                                                    text: 'Data tidak bisa dikembalikan!',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#e3342f',
                                                    cancelButtonColor: '#6c757d',
                                                    confirmButtonText: 'Ya, hapus!',
                                                    cancelButtonText: 'Batal'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $refs.form{{ $product->id }}.submit();
                                                    }
                                                })"
                                                class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-400 italic">
                                    Produk tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- SweetAlert --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif
    @endpush
</x-app-layout>

<x-app-layout>
    <div class="px-6 py-10 text-white mt-6">
        <h1 class="text-3xl font-bold mb-6">Riwayat Pembelian</h1>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#3085d6'
                });
            </script>
        @endif

        @if ($orders->isEmpty())
            <p class="text-gray-400">Belum ada transaksi pembelian.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm bg-gray-900 rounded-lg shadow-lg">
                    <thead>
                        <tr class="text-left text-xs text-gray-400 uppercase bg-gray-800 border-b border-gray-700">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Pembeli</th>
                            <th class="px-4 py-3">Produk</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Harga Satuan</th>
                            <th class="px-4 py-3">Total Harga</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($orders as $order)
                            @foreach($order->items as $item)
                                <tr class="border-b border-gray-800 hover:bg-gray-800">
                                    <td class="px-4 py-2">{{ $no++ }}</td>
                                    <td class="px-4 py-2">{{ $order->user->name }}</td>
                                    <td class="px-4 py-2">{{ $item->product->name }}</td>
                                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-2">
                                        <form id="delete-form-{{ $order->id }}" action="{{ url('/admin/product/histori/' . $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $order->id }}')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- JS Konfirmasi --}}
    <script>
        function confirmDelete(orderId) {
            Swal.fire({
                title: 'Yakin ingin menghapus transaksi ini?',
                text: "Tindakan ini tidak bisa dibatalkan apabila kamu mengkonfirmasinya.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + orderId).submit();
                }
            });
        }
    </script>
</x-app-layout>
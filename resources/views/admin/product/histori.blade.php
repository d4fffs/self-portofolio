<x-app-layout>
    <div class="px-6 py-10 text-white mt-6">
        <h1 class="text-3xl font-bold mb-6">Riwayat Pembelian</h1>

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
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
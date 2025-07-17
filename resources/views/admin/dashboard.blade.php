<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Card Template -->
                @php
                    $cards = [
                        ['label' => 'Total Produk', 'value' => $totalProduk, 'color' => 'text-blue-500', 'icon' => 'cube'],
                        ['label' => 'Total Stok', 'value' => $totalStok, 'color' => 'text-green-500', 'icon' => 'archive'],
                        ['label' => 'Total Harga', 'value' => 'Rp ' . number_format($totalHarga, 0, ',', '.'), 'color' => 'text-yellow-500', 'icon' => 'cash'],
                        ['label' => 'Produk Kosong', 'value' => $produkKosong, 'color' => 'text-red-500', 'icon' => 'x-circle'],
                    ];
                    $icons = [
                        'cube' => '<path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4a2 2 0 001-1.73z" />',
                        'archive' => '<path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" /><path d="M5 8h14v10a2 2 0 01-2 2H7a2 2 0 01-2-2V8z" />',
                        'cash' => '<path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v2h14z" /><path d="M3 9v6a2 2 0 002 2h10a2 2 0 002-2V9H3zm5 3h.01" />',
                        'x-circle' => '<path d="M12 2a10 10 0 100 20 10 10 0 000-20z" /><path d="M15 9l-6 6m0-6l6 6" />',
                    ];
                @endphp

                @foreach($cards as $card)
                    <div class="bg-white p-5 rounded-xl shadow flex flex-col items-center text-center space-y-2">
                        <div class="{{ $card['color'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                {!! $icons[$card['icon']] !!}
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium">{{ $card['label'] }}</p>
                        <h2 class="text-2xl font-bold {{ $card['color'] === 'text-red-500' ? 'text-red-600' : 'text-gray-800' }}">
                            {{ $card['value'] }}
                        </h2>
                    </div>
                @endforeach
            </div>

            <!-- Chart -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-lg md:text-xl font-semibold text-gray-700 mb-4 text-center md:text-left">Visualisasi Stok Produk</h2>
                <div class="overflow-x-auto">
                    <canvas id="stokChart" class="w-full max-w-full" style="min-height: 300px;"></canvas>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('stokChart');
            const stokChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($produkLabels) !!},
                    datasets: [{
                        label: 'Stok Produk',
                        data: {!! json_encode($produkStok) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderRadius: 6,
                        barThickness: 28
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
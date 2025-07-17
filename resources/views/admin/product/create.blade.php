<x-app-layout>
    <section class="px-4 md:px-8 lg:px-16 py-12 mt-6">
        <div class="max-w-3xl mx-auto space-y-8">
            <div class="bg-gray-800 shadow-md sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-white">Tambah Produk</h1>
                    <a href="{{ route('admin/products') }}">
                        <button type="button"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                            Kembali
                        </button>
                    </a>
                </div>

                @if (session()->has('error'))
                    <div class="mb-4 text-sm text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin/products/save') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Nama Produk</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md shadow-sm"
                            placeholder="Nama Produk" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Detail --}}
                    <div>
                        <label for="detail" class="block text-sm font-medium text-gray-300">Detail</label>
                        <input type="text" name="detail" id="detail"
                            class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md shadow-sm"
                            placeholder="Detail Produk" value="{{ old('detail') }}">
                        @error('detail')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-300">Harga</label>
                        <input type="text" name="harga" id="harga"
                            class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md shadow-sm"
                            placeholder="Harga Produk" value="{{ old('harga') }}">
                        @error('harga')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label for="stok" class="block text-sm font-medium text-gray-300">Stok</label>
                        <input type="text" name="stok" id="stok"
                            class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md shadow-sm"
                            placeholder="Jumlah Stok" value="{{ old('stok') }}">
                        @error('stok')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-300">Gambar</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 bg-gray-700">
                        @error('image')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div>
                        <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>

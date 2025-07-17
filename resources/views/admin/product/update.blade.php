<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>
                        @if (session()->has('error'))
                            <div class="text-red-600 font-medium text-sm">
                                {{ session('error') }}
                            </div>
                        @endif
                        <a href="{{ route('admin/products') }}">
                            <button
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Go Back
                            </button>
                        </a>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('admin/products/update', $product->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $product->name) }}" placeholder="Nama Produk"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" />
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Detail -->
                        <div>
                            <label for="detail" class="block text-sm font-medium text-gray-700 mb-1">Detail</label>
                            <input type="text" name="detail" id="detail"
                                value="{{ old('detail', $product->detail) }}" placeholder="Detail"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" />
                            @error('detail')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                            <input type="number" name="harga" id="harga"
                                value="{{ old('harga', $product->harga) }}" placeholder="Harga"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" />
                            @error('harga')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div>
                            <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                            <input type="number" name="stok" id="stok"
                                value="{{ old('stok', $product->stok) }}" placeholder="Stok"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" />
                            @error('stok')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gambar Lama -->
                        @if ($product->image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Sekarang</label>
                                <img src="{{ asset('img/products/' . $product->image) }}"
                                    class="w-32 h-32 object-cover rounded" />
                            </div>
                        @endif

                        <!-- Upload Gambar Baru -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            @error('image')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div>
                            <button type="submit"
                                class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Update Produk
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

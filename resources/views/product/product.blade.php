<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            </div>
            <nav class="mt-6">
                <a href="#" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200">Barang</a>
                <a href="#" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200">Logout</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-gray-800">Tabel Barang</h2>
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-300 text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">Nama Barang</th>
                                <th class="py-2 px-4 border-b">Harga</th>
                                <th class="py-2 px-4 border-b">Stok</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <div>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="py-2 px-4 border-b">ID</td>
                                        <td class="py-2 px-4 border-b">Nama Barang</td>
                                        <td class="py-2 px-4 border-b">Harga</td>
                                        <td class="py-2 px-4 border-b">Stok</td>
                                        <td class="py-2 px-4 border-b">Aksi</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

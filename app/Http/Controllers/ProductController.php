<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Halaman produk untuk admin
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('admin.product.home', compact('products', 'total'));
    }

    // Form tambah produk
    public function create()
    {
        return view('admin.product.create');
    }

    // Simpan produk baru
    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/products'), $filename);
            $validated['image'] = $filename;
        }

        $product = Product::create($validated);

        if ($product) {
            return redirect()->route('admin/products')->with('success', 'Produk berhasil ditambahkan!');
        }

        return redirect()->route('admin/products')->with('error', 'Terjadi kesalahan saat menambahkan produk.');
    }





    // Form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('product'));
    }

    // Simpan hasil edit produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/products'), $imageName);
            $validated['image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin/products')->with('success', 'Berhasil mengupdate produk!');
    }



    // Hapus produk
    public function delete($id)
    {
        $deleted = Product::findOrFail($id)->delete();

        if ($deleted) {
            return redirect()->route('admin/products')->with('success', 'Produk berhasil dihapus!');
        } else {
            return redirect()->route('admin/products')->with('error', 'Gagal menghapus produk.');
        }
    }

    // Tampilkan produk ke publik (user)
    public function publicView()
    {
        $products = Product::orderBy('id', 'desc')->get(); // Ambil semua produk

        return view('dashboard', compact('products'));
    }
}

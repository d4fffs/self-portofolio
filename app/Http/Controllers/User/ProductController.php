<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.show', compact('product'));
    }
    public function purchase(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = $request->input('quantity');

        if ($quantity > $product->stok) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }

        // Kurangi stok dan tambahkan jumlah terjual
        $product->stok -= $quantity;
        $product->terjual += $quantity; // Tambahan: mencatat penjualan
        $product->save();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil dibeli. Terima kasih!');
    }
}

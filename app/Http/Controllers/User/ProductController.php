<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

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

        $totalPrice = $product->harga * $quantity;

        // ✅ Simpan ke tabel orders
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'success',
        ]);

        // ✅ Simpan ke tabel order_items
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->harga,
        ]);

        // ✅ Update stok dan jumlah terjual
        $product->stok -= $quantity;
        $product->terjual += $quantity;
        $product->save();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil dibeli. Terima kasih!');
    }
}

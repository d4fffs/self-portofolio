<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HistoriController extends Controller
{

    public function index()
    {
        $orders = Order::with('user', 'items.product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.product.histori', compact('orders'));
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.product.histori')->with('success', 'Histori berhasil dihapus.');
    }
}

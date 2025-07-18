<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardAdmin extends Controller
{
    public function index()
    {
        // Ambil semua produk
        $products = Product::orderBy('id', 'desc')->get();

        // Statistik
        $totalProduk = $products->count();
        $totalStok = $products->sum('stok');
        $produkKosong = $products->where('stok', 0)->count();

        // Pendapatan berdasarkan jumlah terjual × harga
        $totalPendapatan = $products->sum(function ($product) {
            return $product->harga * $product->terjual;
        });

        // Data untuk chart
        $produkLabels = $products->pluck('name');
        $produkStok = $products->pluck('stok');

        return view('admin.dashboard', compact(
            'products',
            'totalProduk',
            'totalStok',
            'produkKosong',
            'totalPendapatan',
            'produkLabels',
            'produkStok'
        ));
    }
}
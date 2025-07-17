<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardAdmin extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.dashboard', [
            'totalProduk'    => $products->count(),
            'totalStok'      => $products->sum('stok'),
            'totalHarga'     => $products->sum('harga'),
            'produkKosong'   => $products->where('stok', 0)->count(),
            'produkLabels'   => $products->pluck('name'),
            'produkStok'     => $products->pluck('stok'),
        ]);
    }
}
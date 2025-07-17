<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\User\ProductController as UserProductController;

// -----------------------------
// 📢 Public Route
// -----------------------------
Route::get('/', fn() => view('welcome'));

Route::view('/navbar', 'navbar.barang')->name('navbarang');

// -----------------------------
// 👤 User Route (login & verified)
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'publicView'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Produk detail untuk user
    Route::get('/products/{id}', [UserProductController::class, 'show'])->name('user.products.show');
    Route::post('/products/{product}/purchase', [UserProductController::class, 'purchase'])->name('user.products.purchase');

});

// -----------------------------
// 🛡️ Admin Route (login & isAdmin)
// -----------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdmin::class, 'index'])->name('dashboard');

    // Product Management
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/save', [ProductController::class, 'save'])->name('products.save');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
});

// -----------------------------
// 🔐 Auth Scaffolding
// -----------------------------
require __DIR__ . '/auth.php';
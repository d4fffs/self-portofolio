<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\User\ProductController as UserProductController;

// -----------------------------
// 📢 Public Route
// -----------------------------

Route::get('/', function () {
    return view('welcome');
});

Route::view('/navbar', 'navbar.barang')->name('navbarang');

// -----------------------------
// 👤 User Route (login & verified)
// -----------------------------

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'publicView'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----------------------------
// 🛡️ Admin Route (login & isAdmin)
Route::get('/products/{id}', [UserProductController::class, 'show'])->name('user.products.show');
Route::post('/products/{product}/purchase', [UserProductController::class, 'purchase'])->name('user.products.purchase');
// -----------------------------

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard');

    // Product Management
    Route::get('/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::delete('admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
    Route::get('/user/products/{id}', [UserProductController::class, 'show'])->name('user/show');
});

// -----------------------------
// 🔐 Auth Scaffolding (Fortify / Breeze / Jetstream)
// -----------------------------
require __DIR__ . '/auth.php';

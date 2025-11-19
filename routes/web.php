<?php

use App\Http\Controllers\Admin\DashboardController; // Tambahkan ini
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController; // Ganti nama agar tidak bentrok
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// ========================================================================
// HOME REDIRECT
// ========================================================================
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->hasRole('admin')
            ? redirect()->route('admin.dashboard')
            : redirect()->route('products.index');
    }
    return redirect()->route('login');
})->name('home');

// ========================================================================
// AUTH ROUTES
// ========================================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ========================================================================
// USER ROUTES (Hanya bisa melihat product)
// ========================================================================
Route::middleware(['auth', 'can:view products'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});

// ========================================================================
// ADMIN ROUTES (TANPA RESOURCE & TANPA KONFLIK)
// ========================================================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', fn() => redirect()->route('admin.dashboard'));
        // Dashboard admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard.index');

        // CRUD Produk Admin
        Route::get('/products', [AdminProductController::class, 'index'])
            ->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    });

// ========================================================================
// TEST ROUTE
// ========================================================================
Route::get('/test/upload-default-image', function () {
    $localFile = storage_path('app/public/default.jpg');
    $folder = 'products';
    $defaultFileName = 'default_product_image.jpg';

    if (!file_exists($localFile)) {
        return 'File default.jpg tidak ditemukan.';
    }

    try {
        $path = Storage::disk('spaces')->putFileAs(
            $folder,
            $localFile,
            $defaultFileName,
            'public'
        );

        return 'Upload berhasil: ' . $path;
    } catch (\Exception $e) {
        return 'Gagal upload: ' . $e->getMessage();
    }
})->name('test.upload-default-image');

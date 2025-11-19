<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/*--------------------------------------------------------------------------
| HOME REDIRECT
|--------------------------------------------------------------------------*/

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('products.index');
    }
    return redirect()->route('login');
})->name('home');


/*--------------------------------------------------------------------------
| AUTH ROUTES (GUEST ONLY)
|--------------------------------------------------------------------------*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
});


/*--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (USER + ADMIN)
|--------------------------------------------------------------------------*/
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});


/*--------------------------------------------------------------------------
| ADMIN ROUTES (ADMIN ONLY)
|--------------------------------------------------------------------------*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminProductController::class, 'dashboard'])->name('dashboard');

        // CRUD Products Admin
        Route::resource('products', AdminProductController::class);
    });


/*--------------------------------------------------------------------------
| TESTING ROUTES
|--------------------------------------------------------------------------*/
Route::get('/test/upload-default-image', function () {
    $localFile = storage_path('app/public/default.jpg');
    $folder = 'products';
    $defaultFileName = 'default_product_image.jpg';

    if (!file_exists($localFile)) {
        return 'File default.jpg tidak ditemukan di storage/app/public/';
    }

    try {
        $path = Storage::disk('spaces')->putFileAs(
            $folder,
            $localFile,
            $defaultFileName,
            'public'
        );

        return 'Upload berhasil! Path: **' . $path . '**';
    } catch (\Exception $e) {
        return 'Gagal upload: ' . $e->getMessage();
    }
})->name('test.upload-default-image');

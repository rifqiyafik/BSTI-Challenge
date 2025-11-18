<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Storage;

// ==========================================
// HOME — arahkan ke login jika belum login
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->hasRole('user')) {
            return redirect()->route('products.index');
        }
    }

    return redirect()->route('login');
});

// ==========================================
// AUTH ROUTES
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ==========================================
// USER ROUTES
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});

// ==========================================
// ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn() => redirect()->route('admin.products.index'))
            ->name('dashboard');

        Route::resource('products', AdminProductController::class);
    });

Route::get('/test-upload', function () {
    try {
        $uploaded = Storage::disk('s3')->put('test12.txt', 'Hello S3!');
        return $uploaded ? 'Upload berhasil!' : 'Upload gagal!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});



// Route::get('/debug-s3', function () {
//     dd(config('filesystems.disks.s3'));
// });

// Route::get('/debug-env', function () {
//     return [
//         'key' => env('AWS_ACCESS_KEY_ID'),
//         'secret' => env('AWS_SECRET_ACCESS_KEY'),
//         'region' => env('AWS_DEFAULT_REGION'),
//         'bucket' => env('AWS_BUCKET'),
//         'endpoint' => env('AWS_ENDPOINT'),
//     ];
// });


// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Route::get('/test-upload-image', function () {
    // Path file lokal (misal file sample di storage/app/public/test.jpg)
    $localFile = storage_path('app/public/test.jpg');

    if (!file_exists($localFile)) {
        return 'File test.jpg tidak ditemukan di storage/app/public/';
    }

    $uniqueFileName = Str::uuid() . '.jpg';

    try {
        // Upload ke DigitalOcean Spaces
        $path = Storage::disk('spaces')->putFileAs(
            'products',      // folder di bucket
            $localFile,      // file lokal
            $uniqueFileName, // nama unik file
            'public'         // visibility
        );

        return 'Upload berhasil! Path: ' . $path;
    } catch (\Exception $e) {
        return 'Gagal upload: ' . $e->getMessage();
    }
});

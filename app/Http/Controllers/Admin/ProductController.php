<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // ... (index dan create tetap sama)
    public function dashboard()
    {
        // Menghitung Total User
        $totalUsers = User::count();

        // Menghitung Total Product
        $totalProducts = Product::count();

        // Menghitung Total Product yang Aktif
        $activeProducts = Product::active()->count();

        // Menghitung Total Product yang Tidak Aktif
        $inactiveProducts = $totalProducts - $activeProducts;

        // Contoh lain: Total nilai inventori
        $totalInventoryValue = Product::sum('price');


        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'activeProducts' => $activeProducts,
            'inactiveProducts' => $inactiveProducts,
            'totalInventoryValue' => $totalInventoryValue,
        ]);
    }
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // 1. Tentukan Rules Validasi
        $rules = [
            'name'                => 'required|string|max:255',
            'brand'               => 'required|string|max:255',
            'description'         => 'required|string',
            'processor'           => 'required|string',
            'ram_gb'              => 'required|integer|min:1',
            'storage_gb'          => 'required|integer|min:1',
            'storage_type'        => 'required|string',
            'gpu'                 => 'nullable|string',
            'display_size_inch'   => 'required|numeric|min:1',
            'display_resolution'  => 'required|string',
            'price'               => 'required|numeric|min:0',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active'           => 'boolean',
        ];

        // 2. Tentukan Pesan Validasi Kustom
        $messages = [
            'name.required'             => 'Nama produk harus diisi.',
            'brand.required'            => 'Merek produk harus diisi.',
            'description.required'      => 'Deskripsi produk harus diisi.',
            'processor.required'        => 'Spesifikasi Prosesor harus diisi.',
            'ram_gb.required'           => 'Kapasitas RAM harus diisi.',
            'ram_gb.integer'            => 'Kapasitas RAM harus berupa angka bulat.',
            'storage_gb.required'       => 'Kapasitas Penyimpanan harus diisi.',
            'storage_type.required'     => 'Jenis Penyimpanan (SSD/HDD) harus dipilih.',
            'display_size_inch.required' => 'Ukuran Layar harus diisi.',
            'display_size_inch.numeric' => 'Ukuran Layar harus berupa angka.',
            'price.required'            => 'Harga produk harus diisi.',
            'price.numeric'             => 'Harga produk harus berupa angka.',
            'image.image'               => 'File harus berupa gambar.',
            'image.mimes'               => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image.max'                 => 'Ukuran gambar maksimal 2MB.',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uniqueFileName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            try {
                // SPACES Upload (Perbaikan: menggunakan path lengkap untuk DB)
                Storage::disk('spaces')->putFileAs(
                    'products',
                    $image,
                    $uniqueFileName,
                    'public'
                );

                // Simpan path lengkap ke database: products/nama-unik.ext
                $validated['image'] = 'products/' . $uniqueFileName;
            } catch (\Exception $e) {
                return redirect()->route('admin.products.index')
                    ->with('error', 'Gagal mengunggah gambar ke Object Storage. Detail: ' . $e->getMessage());
            }
        }

        Product::create($validated);

        // Notifikasi sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // 1. Tentukan Rules Validasi (sama seperti store)
        $rules = [
            'name'                => 'required|string|max:255',
            'brand'               => 'required|string|max:255',
            'description'         => 'required|string',
            'processor'           => 'required|string',
            'ram_gb'              => 'required|integer|min:1',
            'storage_gb'          => 'required|integer|min:1',
            'storage_type'        => 'required|string',
            'gpu'                 => 'nullable|string',
            'display_size_inch'   => 'required|numeric|min:1',
            'display_resolution'  => 'required|string',
            'price'               => 'required|numeric|min:0',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active'           => 'boolean',
        ];

        // 2. Tentukan Pesan Validasi Kustom (sama seperti store)
        $messages = [
            'name.required'             => 'Nama produk harus diisi.',
            'brand.required'            => 'Merek produk harus diisi.',
            'description.required'      => 'Deskripsi produk harus diisi.',
            'processor.required'        => 'Spesifikasi Prosesor harus diisi.',
            'ram_gb.required'           => 'Kapasitas RAM harus diisi.',
            'ram_gb.integer'            => 'Kapasitas RAM harus berupa angka bulat.',
            'storage_gb.required'       => 'Kapasitas Penyimpanan harus diisi.',
            'storage_type.required'     => 'Jenis Penyimpanan (SSD/HDD) harus dipilih.',
            'display_size_inch.required' => 'Ukuran Layar harus diisi.',
            'display_size_inch.numeric' => 'Ukuran Layar harus berupa angka.',
            'price.required'            => 'Harga produk harus diisi.',
            'price.numeric'             => 'Harga produk harus berupa angka.',
            'image.image'               => 'File harus berupa gambar.',
            'image.mimes'               => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image.max'                 => 'Ukuran gambar maksimal 2MB.',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            // Hapus gambar lama sebelum upload yang baru
            if ($product->image) {
                try {
                    Storage::disk('spaces')->delete($product->image);
                } catch (\Exception $e) {
                    // Log error tapi lanjutkan proses update
                    Log::error("Gagal menghapus gambar lama dari SPACES: " . $product->image . " | Error: " . $e->getMessage());
                }
            }

            $image = $request->file('image');
            $uniqueFileName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            try {
                // SPACES Upload
                Storage::disk('spaces')->putFileAs(
                    'products',
                    $image,
                    $uniqueFileName,
                    'public'
                );

                // Simpan path lengkap ke database
                $validated['image'] = 'products/' . $uniqueFileName;
            } catch (\Exception $e) {
                // Notifikasi gagal jika SPACES upload gagal
                return redirect()->route('admin.products.index')
                    ->with('error', 'Gagal mengunggah gambar baru ke Object Storage. Detail: ' . $e->getMessage());
            }
        } else if ($request->input('remove_image')) {
            // Logika opsional: Jika ada checkbox untuk hapus gambar tanpa mengganti
            if ($product->image) {
                Storage::disk('spaces')->delete($product->image);
                $validated['image'] = null;
            }
        } else {
            // Pastikan gambar lama tetap ada jika user tidak upload gambar baru
            unset($validated['image']);
        }

        $product->update($validated);

        // Notifikasi sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            try {
                // Hapus file dari SPACES
                Storage::disk('spaces')->delete($product->image);
            } catch (\Exception $e) {
                Log::error("Gagal menghapus gambar SPACES saat destroy: " . $product->image . " | Error: " . $e->getMessage());
                $product->delete();
                return redirect()->route('admin.products.index')
                    ->with('error', 'Produk dihapus, tapi gagal menghapus gambar dari Object Storage.');
            }
        }

        $product->delete();

        // Notifikasi sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}

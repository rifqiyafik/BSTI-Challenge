@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-5">
    <h1 class="text-3xl font-bold">Product List</h1>
    <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add Product
    </a>
</div>

{{-- NOTIFIKASI SUKSES/GAGAL --}}
@if (session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ session('error') }}</span>
</div>
@endif
{{-- END NOTIFIKASI SUKSES/GAGAL --}}

<div class="p-8 rounded-2xl bg-white/50 backdrop-blur-xl shadow-xl border border-white/30">
    <table class="min-w-full bg-white/60 backdrop-blur-xl border border-white/30 rounded-xl overflow-hidden shadow">
        <thead>
            <tr class="bg-gradient-to-r from-purple-400 to-blue-400 text-white">
                <th class="py-2 px-3 border">Image</th>
                <th class="py-2 px-3 border">Name</th>
                <th class="py-2 px-3 border">Brand</th>
                <th class="py-2 px-3 border">Processor</th>
                <th class="py-2 px-3 border">RAM (GB)</th>
                <th class="py-2 px-3 border">Storage</th>
                <th class="py-2 px-3 border">Price</th>
                <th class="py-2 px-3 border">Status</th>
                <th class="py-2 px-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="border-b">
                <td class="py-2 px-3 border">
                    {{-- Menggunakan accessor image_url --}}
                    @if ($product->image)
                        <img src="{{ $product->image_url }}" alt="Product Image" class="h-14">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </td>
                <td class="py-2 px-3 border">{{ $product->name }}</td>
                <td class="py-2 px-3 border">{{ $product->brand }}</td>
                <td class="py-2 px-3 border">{{ $product->processor }}</td>
                <td class="py-2 px-3 border">{{ $product->ram_gb }}</td>
                <td class="py-2 px-3 border">
                    {{ $product->storage_gb }} GB {{ $product->storage_type }}
                </td>
                <td class="py-2 px-3 border">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="py-2 px-3 border">
                    <span class="px-2 py-1 rounded text-white
                        {{ $product->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="py-2 px-3 border">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                        class="px-3 py-1 rounded-xl bg-gradient-to-r from-yellow-400 to-orange-400
                        text-white shadow hover:scale-105 transition"
                        >Edit</a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                          class="inline-block"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 rounded-xl bg-gradient-to-r from-red-500 to-red-600
                        text-white shadow hover:scale-105 transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination links --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('title', 'Product List')

@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="{{ route('products.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add Product
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <table class="min-w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Category</th>
                <th class="border px-4 py-2">Price</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td class="border px-4 py-2 text-center">
                        <img src="{{ asset('storage/' . $product->image_url) }}"
                             class="h-16 w-16 object-cover rounded mx-auto">
                    </td>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->category }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('products.show', $product) }}"
                           class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('products.edit', $product) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline"
                                    onclick="return confirm('Delete this product?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        No products found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection --}}





@extends('layouts.app')

@section('title', 'Products List')

@section('content')
<div class="px-4 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Products</h1>
        <a href="{{ route('products.create') }}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Product
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @forelse($products as $product)
                <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <img src="{{ asset('storage/' . $product->image_url) }}"
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 100) }}</p>
                        <p class="text-blue-600 font-bold text-lg mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                            {{ $product->category }}
                        </span>

                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('products.show', $product) }}"
                               class="flex-1 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">
                                View
                            </a>
                            <a href="{{ route('products.edit', $product) }}"
                               class="flex-1 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-center">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product) }}"
                                  method="POST"
                                  class="flex-1"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500">No products found.</p>
                </div>
            @endforelse
        </div>

        <div class="px-6 pb-6">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

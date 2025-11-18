@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="px-4 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Product Details</h1>
        <a href="{{ route('products.index') }}"
           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to List
        </a>
    </div>

    <div class="bg-white shadow sm:rounded-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                <img src="{{ $product->image_url }}"
                     alt="{{ $product->name }}"
                     class="w-full h-96 object-cover">
            </div>

            <div class="md:w-1/2 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $product->name }}</h2>

                <div class="mb-4">
                    <span class="text-gray-600 font-semibold">Category:</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-2">
                        {{ $product->category }}
                    </span>
                </div>

                <div class="mb-4">
                    <span class="text-gray-600 font-semibold">Price:</span>
                    <span class="text-blue-600 font-bold text-2xl ml-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                <div class="mb-6">
                    <span class="text-gray-600 font-semibold block mb-2">Description:</span>
                    <p class="text-gray-700">{{ $product->description }}</p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('products.edit', $product) }}"
                       class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

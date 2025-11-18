<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <a href="{{ route('products.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 font-bold mb-8 transition">
        ← Back to Catalog
    </a>

    <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border-2 border-purple-200">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <!-- Image Section -->
            <div>
                <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-purple-100 to-pink-100 aspect-square">
                    @if($product->image)
                        <img
                            src="{{ $product->image_url }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover"
                        >
                    @else
                        <div class="flex items-center justify-center h-full">
                            <span class="text-9xl">💻</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Details Section -->
            <div class="flex flex-col justify-between">
                <div>
                    <p class="text-sm font-bold text-purple-600 uppercase tracking-wide mb-2">
                        {{ $product->brand }}
                    </p>

                    <h1 class="text-4xl font-black text-gray-900 mb-4">
                        {{ $product->name }}
                    </h1>

                    <div class="mb-6">
                        <p class="text-5xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl font-black text-gray-900 mb-3">About This Product 📝</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <!-- Specifications -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-black text-gray-900">Specifications 🔧</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-2 border-purple-200">
                                <p class="text-xs font-bold text-purple-600 uppercase mb-1">Processor</p>
                                <p class="font-bold text-gray-900">{{ $product->processor }}</p>
                            </div>

                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-2 border-purple-200">
                                <p class="text-xs font-bold text-purple-600 uppercase mb-1">RAM</p>
                                <p class="font-bold text-gray-900">{{ $product->ram_gb }} GB</p>
                            </div>

                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-2 border-purple-200">
                                <p class="text-xs font-bold text-purple-600 uppercase mb-1">Storage</p>
                                <p class="font-bold text-gray-900">
                                    {{ $product->storage_gb }} {{ strtoupper($product->storage_type) }}
                                </p>
                            </div>

                            @if($product->gpu)
                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-2 border-purple-200">
                                <p class="text-xs font-bold text-purple-600 uppercase mb-1">Graphics</p>
                                <p class="font-bold text-gray-900">{{ $product->gpu }}</p>
                            </div>
                            @endif

                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-2 border-purple-200">
                                <p class="text-xs font-bold text-purple-600 uppercase mb-1">Display Size</p>
                                <p class="font-bold text-gray-900">{{ $product->display_size_inch }} Inch</p>
                            </div>

                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-2 border-purple-200">
                                <p class="text-xs font-bold text-purple-600 uppercase mb-1">Resolution</p>
                                <p class="font-bold text-gray-900">{{ $product->display_resolution }}</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-8 space-y-4">
                    <button
                        class="w-full py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-black rounded-xl hover:shadow-2xl transition transform hover:scale-105 text-lg"
                    >
                        Add to Cart 🛒
                    </button>

                    <button class="w-full py-4 bg-white border-2 border-purple-600 text-purple-600 font-black rounded-xl hover:bg-purple-50 transition">
                        Add to Wishlist ❤️
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

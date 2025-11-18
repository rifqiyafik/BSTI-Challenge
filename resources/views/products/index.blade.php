<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title', 'Explore Products')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-6xl font-black bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 bg-clip-text text-transparent mb-4">
            Find Your Perfect Product 💻
        </h1>
        <p class="text-xl text-gray-600">Discover the best products that match your vibe ✨</p>
    </div>

    <!-- Search & Filter Section -->
    <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl p-6 mb-8 border-2 border-purple-200">
        <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search -->
            <div class="md:col-span-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="🔍 Search product, brand, processor..."
                    class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-200 transition"
                >
            </div>

            <!-- Brand Filter -->
            <div>
                <select
                    name="brand"
                    class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-200 transition"
                >
                    <option value="">All Brands 🏷️</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                            {{ $brand }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sort -->
            <div>
                <select
                    name="sort"
                    class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-200 transition"
                    onchange="this.form.submit()"
                >
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest 🆕</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High 💰</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low 💎</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z 🔤</option>
                </select>
            </div>

            <button
                type="submit"
                class="md:col-span-4 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl hover:shadow-xl transition transform hover:scale-105"
            >
                Search 🚀
            </button>
        </form>
    </div>

    <!-- Results Count -->
    <div class="mb-6">
        <p class="text-gray-600 font-medium">
            Found <span class="font-black text-purple-600">{{ $products->total() }}</span> awesome products 🎉
        </p>
    </div>

    <!-- Product Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product) }}" class="group">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-transparent hover:border-purple-500 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        <!-- Image -->
                        <div class="relative h-48 bg-gradient-to-br from-purple-100 to-pink-100 overflow-hidden">
                            @if($product->image)
                                <img
                                    src="{{ $product->image_url }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                >
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <span class="text-6xl">💻</span>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-4">
                            <p class="text-xs font-bold text-purple-600 uppercase tracking-wide mb-1">
                                {{ $product->brand }}
                            </p>

                            <h3 class="font-black text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition">
                                {{ $product->name }}
                            </h3>

                            <!-- Specs Preview -->
                            <div class="space-y-1 mb-3 text-xs text-gray-600">
                                <p>🖥️ {{ $product->processor }}</p>
                                <p>💾 {{ $product->ram_gb }}GB | {{ $product->storage_gb }}{{ strtoupper($product->storage_type) }}</p>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                                <p class="text-2xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-full text-xs font-bold">
                                    View Details →
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="flex justify-center">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-center py-20">
            <div class="text-8xl mb-4">😢</div>
            <h3 class="text-2xl font-black text-gray-800 mb-2">No products found</h3>
            <p class="text-gray-600">Try adjusting your search or filters</p>
        </div>
    @endif
</div>
@endsection

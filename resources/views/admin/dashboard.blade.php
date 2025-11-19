@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-blue-500 mb-8">
        📊 Dashboard Overview
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Total Users Card --}}
        <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/30 transform hover:scale-[1.02] transition-all">
            <div class="flex items-center justify-between">
                <i class="fa-solid fa-users text-4xl text-purple-500"></i>
                <span class="text-xs font-semibold uppercase text-gray-500">Total Users</span>
            </div>
            <p class="text-4xl font-extrabold mt-3">{{ number_format($totalUsers) }}</p>
        </div>

        {{-- Total Products Card --}}
        <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/30 transform hover:scale-[1.02] transition-all">
            <div class="flex items-center justify-between">
                <i class="fa-solid fa-box-open text-4xl text-blue-500"></i>
                <span class="text-xs font-semibold uppercase text-gray-500">Total Products</span>
            </div>
            <p class="text-4xl font-extrabold mt-3">{{ number_format($totalProducts) }}</p>
        </div>

        {{-- Active Products Card --}}
        <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/30 transform hover:scale-[1.02] transition-all">
            <div class="flex items-center justify-between">
                <i class="fa-solid fa-check-circle text-4xl text-green-500"></i>
                <span class="text-xs font-semibold uppercase text-gray-500">Active Products</span>
            </div>
            <p class="text-4xl font-extrabold mt-3">{{ number_format($activeProducts) }}</p>
        </div>

        {{-- Inactive Products Card --}}
        <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/30 transform hover:scale-[1.02] transition-all">
            <div class="flex items-center justify-between">
                <i class="fa-solid fa-times-circle text-4xl text-red-500"></i>
                <span class="text-xs font-semibold uppercase text-gray-500">Inactive Products</span>
            </div>
            <p class="text-4xl font-extrabold mt-3">{{ number_format($inactiveProducts) }}</p>
        </div>

        {{-- Total Inventory Value Card --}}
        <div class="md:col-span-2 lg:col-span-4 bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/30 transform hover:scale-[1.01] transition-all">
            <div class="flex items-center justify-between">
                <i class="fa-solid fa-sack-dollar text-4xl text-orange-500"></i>
                <span class="text-xs font-semibold uppercase text-gray-500">Total Inventory Value (All Products)</span>
            </div>
            <p class="text-4xl font-extrabold mt-3">
                Rp {{ number_format($totalInventoryValue, 0, ',', '.') }}
            </p>
            <p class="text-sm text-gray-500 mt-1">*Berdasarkan harga jual saat ini.</p>
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Quick Links</h2>
        <div class="flex gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Manage Products
            </a>
            <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition">
                Add New Product
            </a>
        </div>
    </div>

@endsection

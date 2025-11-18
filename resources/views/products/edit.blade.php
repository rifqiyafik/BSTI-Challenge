@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Product</h1>

<form action="{{ route('products.update', $product) }}"
      method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded-lg shadow-md">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-medium">Product Name</label>
        <input type="text" name="name" class="w-full border px-3 py-2 rounded"
               value="{{ $product->name }}">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Description</label>
        <textarea name="description" class="w-full border px-3 py-2 rounded">{{ $product->description }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Price</label>
        <input type="number" name="price" class="w-full border px-3 py-2 rounded"
               value="{{ $product->price }}">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Category</label>
        <input type="text" name="category" class="w-full border px-3 py-2 rounded"
               value="{{ $product->category }}">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Current Image</label>
        <img src="{{ asset('storage/' . $product->image_url) }}" class="h-24 w-24 object-cover rounded">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Change Image (optional)</label>
        <input type="file" name="image" class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
        Update Product
    </button>
</form>
@endsection

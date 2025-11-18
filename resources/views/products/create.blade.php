@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc ml-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add New Product</h1>

<form action="{{ route('products.store') }}" method="POST"
      enctype="multipart/form-data"
      class="bg-white p-6 rounded-lg shadow-md">
    @csrf

    <div class="mb-4">
        <label class="block font-medium">Product Name</label>
        <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Description</label>
        <textarea name="description" class="w-full border px-3 py-2 rounded" required></textarea>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Price</label>
        <input type="number" name="price" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Category</label>
        <input type="text" name="category" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Image</label>
        <input type="file" name="image" class="w-full border px-3 py-2 rounded" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Product
    </button>
</form>
@endsection

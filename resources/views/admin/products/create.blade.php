@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-5">Add New Product</h1>

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

<div class="bg-white p-6 shadow rounded">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- NAME --}}
            <div>
                <label class="font-semibold block mb-1">Name</label>
                <input type="text" name="name"
                       class="w-full p-2 border rounded @error('name') border-red-500 @enderror"
                       value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- BRAND --}}
            <div>
                <label class="font-semibold block mb-1">Brand</label>
                <input type="text" name="brand"
                       class="w-full p-2 border rounded @error('brand') border-red-500 @enderror"
                       value="{{ old('brand') }}" required>
                @error('brand')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DESCRIPTION --}}
            <div class="col-span-1 md:col-span-2">
                <label class="font-semibold block mb-1">Description</label>
                <textarea name="description"
                          class="w-full p-2 border rounded @error('description') border-red-500 @enderror"
                          rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- PROCESSOR --}}
            <div>
                <label class="font-semibold block mb-1">Processor</label>
                <input type="text" name="processor"
                       class="w-full p-2 border rounded @error('processor') border-red-500 @enderror"
                       value="{{ old('processor') }}" required>
                @error('processor')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- RAM (GB) --}}
            <div>
                <label class="font-semibold block mb-1">RAM (GB)</label>
                <input type="number" name="ram_gb"
                       class="w-full p-2 border rounded @error('ram_gb') border-red-500 @enderror"
                       value="{{ old('ram_gb') }}" required>
                @error('ram_gb')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- STORAGE (GB) --}}
            <div>
                <label class="font-semibold block mb-1">Storage (GB)</label>
                <input type="number" name="storage_gb"
                       class="w-full p-2 border rounded @error('storage_gb') border-red-500 @enderror"
                       value="{{ old('storage_gb') }}" required>
                @error('storage_gb')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- STORAGE TYPE --}}
            <div>
                <label class="font-semibold block mb-1">Storage Type</label>
                <select name="storage_type"
                        class="w-full p-2 border rounded @error('storage_type') border-red-500 @enderror" required>
                    <option value="SSD" {{ old('storage_type') == 'SSD' ? 'selected' : '' }}>SSD</option>
                    <option value="HDD" {{ old('storage_type') == 'HDD' ? 'selected' : '' }}>HDD</option>
                </select>
                @error('storage_type')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- GPU (optional) --}}
            <div>
                <label class="font-semibold block mb-1">GPU (optional)</label>
                <input type="text" name="gpu"
                       class="w-full p-2 border rounded @error('gpu') border-red-500 @enderror"
                       value="{{ old('gpu') }}">
                @error('gpu')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DISPLAY SIZE (inch) --}}
            <div>
                <label class="font-semibold block mb-1">Display Size (inch)</label>
                <input type="number" step="0.1" name="display_size_inch"
                       class="w-full p-2 border rounded @error('display_size_inch') border-red-500 @enderror"
                       value="{{ old('display_size_inch') }}" required>
                @error('display_size_inch')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DISPLAY RESOLUTION --}}
            <div>
                <label class="font-semibold block mb-1">Display Resolution</label>
                <input type="text" name="display_resolution"
                       class="w-full p-2 border rounded @error('display_resolution') border-red-500 @enderror"
                       value="{{ old('display_resolution') }}" required>
                @error('display_resolution')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- PRICE (Rp) --}}
            <div>
                <label class="font-semibold block mb-1">Price (Rp)</label>
                <input type="number" name="price"
                       class="w-full p-2 border rounded @error('price') border-red-500 @enderror"
                       value="{{ old('price') }}" required>
                @error('price')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- IMAGE --}}
            <div>
                <label class="font-semibold block mb-1">Image</label>
                <input type="file" name="image"
                       class="w-full p-2 border rounded @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- STATUS --}}
            <div>
                <label class="font-semibold block mb-1">Status</label>
                <select name="is_active"
                        class="w-full p-2 border rounded @error('is_active') border-red-500 @enderror">
                    <option value="1" {{ old('is_active') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <button type="submit" class="mt-5 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Save Product
        </button>
    </form>
</div>
@endsection

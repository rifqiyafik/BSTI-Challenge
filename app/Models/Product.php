<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'processor',
        'ram_gb',
        'storage_gb',
        'storage_type',
        'gpu',
        'display_resolution',
        'display_size_inch',
        'price',
        'image',
        'is_active'
    ];
    protected const DEFAULT_IMAGE_PATH = 'products/12961362-3f89-493a-8e03-0ac954210a54.jpg';
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Accessor untuk mendapatkan URL gambar dari S3
    public function getImageUrlAttribute()
    {
        $disk = Storage::disk('spaces');

        // Jika produk punya gambar dan file ada di Spaces
        if ($this->image && $disk->exists($this->image)) {
            return $disk->url($this->image);
        }

        // Jika tidak ada gambar → pakai default dari Spaces
        if ($disk->exists(self::DEFAULT_IMAGE_PATH)) {
            return $disk->url(self::DEFAULT_IMAGE_PATH);
        }

        // Fallback terakhir (tidak akan terjadi kalau default ada)
        return asset('storage/default.jpg');
    }



    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

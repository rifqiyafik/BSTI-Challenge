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

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Accessor untuk mendapatkan URL gambar dari S3
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::disk('s3')->url($this->image);
        }
        return asset('images/no-image.png');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

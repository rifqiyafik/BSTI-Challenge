<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active();

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%")
                    ->orWhere('brand', 'ilike', "%{$search}%")
                    ->orWhere('processor', 'ilike', "%{$search}%");
            });
        }

        // Filter by brand
        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand', $request->brand);
        }

        // Sort
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12);
        $brands = Product::active()->distinct()->pluck('brand');

        return view('products.index', compact('products', 'brands'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}

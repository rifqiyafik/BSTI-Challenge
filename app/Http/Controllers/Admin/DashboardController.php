<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'activeProducts' => Product::active()->count(),
            'inactiveProducts' => Product::count() - Product::active()->count(),
            'totalInventoryValue' => Product::sum('price'),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $lowStockCount = Product::where('stock', '<=', 10)->count();
        $totalInventoryValue = Product::selectRaw('SUM(price * stock) as total_val')->value('total_val') ?? 0;

        $recentProducts = Product::with('category')->latest()->take(5)->get();
        $categories = Category::withCount('products')->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'lowStockCount',
            'totalInventoryValue',
            'recentProducts',
            'categories'
        ));
    }
}

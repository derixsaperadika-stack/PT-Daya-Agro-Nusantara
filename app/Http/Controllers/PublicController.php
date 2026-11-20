<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * Display the public homepage.
     */
    public function index(): View
    {
        $categories = Category::withCount('products')->get();
        $featuredProducts = Product::with('category')
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $latestProducts = Product::with('category')
            ->latest()
            ->take(6)
            ->get();

        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'local_farmers' => '120+',
            'hectares' => '85 Ha',
        ];

        return view('public.index', compact('categories', 'featuredProducts', 'latestProducts', 'stats'));
    }

    /**
     * Display the product catalog with category filter & search.
     */
    public function products(Request $request): View
    {
        $categories = Category::withCount('products')->get();

        $query = Product::with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->query('category'));
            });
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $activeCategory = $request->filled('category')
            ? Category::where('slug', $request->query('category'))->first()
            : null;

        $products = $query->latest()->paginate(9)->withQueryString();

        return view('public.products', compact('products', 'categories', 'activeCategory'));
    }

    /**
     * Display product detail.
     */
    public function productDetail(string $slug): View
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('public.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Display About Us page.
     */
    public function about(): View
    {
        return view('public.about');
    }

    /**
     * Display Contact page.
     */
    public function contact(): View
    {
        return view('public.contact');
    }
}

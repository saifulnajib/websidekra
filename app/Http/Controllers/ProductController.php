<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UmkmOwner;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('umkmOwner', 'umkmCategory');

        if ($request->has('umkm')) {
            $query->where('umkm_owner_id', $request->umkm);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        $umkms = UmkmOwner::withCount('products')
            ->having('products_count', '>', 0)
            ->get();

        return view('products.index', compact('products', 'umkms'));
    }

    public function show($id)
    {
        $product = Product::with('umkmOwner', 'umkmCategory')->findOrFail($id);

        // Get related products from same UMKM or Category
        $relatedProducts = Product::where('id', '!=', $id)
            ->where(function ($q) use ($product) {
                $q->where('umkm_owner_id', $product->umkm_owner_id)
                    ->orWhere('umkm_category_id', $product->umkm_category_id);
            })
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}

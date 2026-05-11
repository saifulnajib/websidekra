<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConfig;
use App\Models\News;
use App\Models\Gallery;

class FrontController extends Controller
{
    public function index()
    {
        $configs = SiteConfig::all();
        $data = [];

        $data['latestNews'] = News::orderBy('created_at', 'desc')->take(3)->get();

        // Fetch Statistics
        $data['umkmCount'] = \App\Models\UmkmOwner::count();
        $data['productCount'] = \App\Models\Product::count();

        // Fetch Latest Products
        $data['latestProducts'] = \App\Models\Product::with('umkmCategory', 'umkmOwner')
            ->latest()
            ->take(4)
            ->get();

        // Fetch Gallery Items
        $data['galleryItems'] = Gallery::orderBy('created_at', 'desc')->with('galleryItems')->take(8)->get();

        // Fetch Latest UMKM Owners (aktif) for artisan/UMKM section
        $data['latestUmkmOwners'] = \App\Models\UmkmOwner::with('category')
            ->where('status', 'aktif')
            ->latest()
            ->take(4)
            ->get();

        // Fetch Artisans (aktif)
        $data['artisans'] = \App\Models\Artisan::with('umkmOwner')
            ->where('status', 'aktif')
            ->latest()
            ->take(4)
            ->get();

        // SiteConfigs are now handled in AppServiceProvider via View::share

        return view('index', $data);
    }

    public function guide()
    {
        return view('guide', ['active' => 'guide']);
    }

    public function artisanDetail(\App\Models\Artisan $artisan)
    {
        $artisan->load(['umkmOwner', 'products.umkmCategory']);
        
        return view('artisans.show', [
            'artisan' => $artisan,
            'active' => 'artisans'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConfig;
use App\Models\News;

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

        // SiteConfigs are now handled in AppServiceProvider via View::share

        return view('index', $data);
    }
}

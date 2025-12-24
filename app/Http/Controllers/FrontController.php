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

        foreach ($configs as $config) {
            $value = $config->value;

            // Handle file and image URLs
            if (in_array($config->type, ['file', 'image']) && $value) {
                $value = asset('storage/' . $value);
            } else {
                $value = SiteConfig::castValue($value, $config->type);
            }

            $data[$config->key] = $value;
        }

        return view('index', $data);
    }
}

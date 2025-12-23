<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConfig;

class FrontController extends Controller
{
    public function index()
    {
        $configs = SiteConfig::all();
        $data = [];

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConfig;

class FrontController extends Controller
{
    public function index()
    {
        $data = SiteConfig::all()->pluck('value', 'key')->toArray();
        // dd($data);
        return view('index',$data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('is_published', true);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $news = $query->orderBy('published_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('news.index', compact('news'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Increment views
        $news->increment('views');

        // Get related news
        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }
}
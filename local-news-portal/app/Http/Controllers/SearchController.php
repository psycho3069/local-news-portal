<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');
        $articles = collect();
        
        if ($query) {
            $articles = Article::published()
                ->where(function($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhere('content', 'LIKE', "%{$query}%")
                      ->orWhere('excerpt', 'LIKE', "%{$query}%");
                })
                ->with('category')
                ->latest()
                ->paginate(12);
        }

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('search', compact('articles', 'query', 'categories'));
    }
}

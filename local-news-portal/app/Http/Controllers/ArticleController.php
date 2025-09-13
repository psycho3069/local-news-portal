<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function show($categorySlug, $slug)
    {
        $article = Article::published()
            ->where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        // Increment views
        $article->increment('views');

        $relatedArticles = Article::published()
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('article', compact('article', 'relatedArticles', 'categories'));
    }
}

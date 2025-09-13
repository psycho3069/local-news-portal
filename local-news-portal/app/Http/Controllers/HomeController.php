<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredArticles = Article::published()
            ->featured()
            ->latest()
            ->with('category')
            ->take(6)
            ->get();

        $latestArticles = Article::published()
            ->latest()
            ->with('category')
            ->take(20)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('featuredArticles', 'latestArticles', 'categories'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\Page;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalArticles = Article::count();
        $publishedArticles = Article::published()->count();
        $featuredArticles = Article::featured()->count();
        $totalCategories = Category::count();
        $totalPhotos = PhotoGallery::count();
        $totalVideos = VideoGallery::count();
        $totalPages = Page::count();
        
        $recentArticles = Article::latest()->take(5)->with('category')->get();
        
        return view('admin.dashboard', compact(
            'totalArticles', 
            'publishedArticles', 
            'featuredArticles', 
            'totalCategories',
            'totalPhotos',
            'totalVideos',
            'totalPages',
            'recentArticles'
        ));
    }
}

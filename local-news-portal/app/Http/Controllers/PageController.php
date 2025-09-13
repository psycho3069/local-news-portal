<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::active()
            ->where('slug', $slug)
            ->firstOrFail();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('page', compact('page', 'categories'));
    }
}

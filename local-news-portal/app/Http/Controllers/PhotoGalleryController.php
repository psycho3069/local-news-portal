<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Category;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photos = PhotoGallery::active()
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('photo-gallery.index', compact('photos', 'categories'));
    }

    public function show($slug)
    {
        $photo = PhotoGallery::active()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPhotos = PhotoGallery::active()
            ->where('id', '!=', $photo->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('photo-gallery.show', compact('photo', 'relatedPhotos', 'categories'));
    }
}

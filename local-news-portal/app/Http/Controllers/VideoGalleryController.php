<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoGallery;
use App\Models\Category;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::active()
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('video-gallery.index', compact('videos', 'categories'));
    }

    public function show($slug)
    {
        $video = VideoGallery::active()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedVideos = VideoGallery::active()
            ->where('id', '!=', $video->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('video-gallery.show', compact('video', 'relatedVideos', 'categories'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminVideoGalleryController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::latest()->paginate(15);
        return view('admin.video-galleries.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video-galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'video_url' => 'required|url',
            'video_type' => 'required|in:youtube,vimeo,local',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('media/video-thumbnails'), $thumbnailName);
            $data['thumbnail_path'] = 'media/video-thumbnails/' . $thumbnailName;
        }

        VideoGallery::create($data);

        return redirect()->route('admin.video-galleries.index')->with('success', 'Video added successfully!');
    }

    public function show(string $id)
    {
        $video = VideoGallery::findOrFail($id);
        return view('admin.video-galleries.show', compact('video'));
    }

    public function edit(string $id)
    {
        $video = VideoGallery::findOrFail($id);
        return view('admin.video-galleries.edit', compact('video'));
    }

    public function update(Request $request, string $id)
    {
        $video = VideoGallery::findOrFail($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'video_url' => 'required|url',
            'video_type' => 'required|in:youtube,vimeo,local',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('media/video-thumbnails'), $thumbnailName);
            $data['thumbnail_path'] = 'media/video-thumbnails/' . $thumbnailName;
        }

        $video->update($data);

        return redirect()->route('admin.video-galleries.index')->with('success', 'Video updated successfully!');
    }

    public function destroy(string $id)
    {
        $video = VideoGallery::findOrFail($id);
        $video->delete();
        return redirect()->route('admin.video-galleries.index')->with('success', 'Video deleted successfully!');
    }
}

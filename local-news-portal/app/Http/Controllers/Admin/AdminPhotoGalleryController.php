<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPhotoGalleryController extends Controller
{
    public function index()
    {
        $photos = PhotoGallery::latest()->paginate(15);
        return view('admin.photo-galleries.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photo-galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|max:2048',
            'description' => 'nullable'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/photos'), $imageName);
            $data['image_path'] = 'media/photos/' . $imageName;
            
            // Create thumbnail (you can implement image resizing here)
            $data['thumbnail_path'] = 'media/photos/' . $imageName;
        }

        PhotoGallery::create($data);

        return redirect()->route('admin.photo-galleries.index')->with('success', 'Photo added successfully!');
    }

    public function show(string $id)
    {
        $photo = PhotoGallery::findOrFail($id);
        return view('admin.photo-galleries.show', compact('photo'));
    }

    public function edit(string $id)
    {
        $photo = PhotoGallery::findOrFail($id);
        return view('admin.photo-galleries.edit', compact('photo'));
    }

    public function update(Request $request, string $id)
    {
        $photo = PhotoGallery::findOrFail($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/photos'), $imageName);
            $data['image_path'] = 'media/photos/' . $imageName;
            $data['thumbnail_path'] = 'media/photos/' . $imageName;
        }

        $photo->update($data);

        return redirect()->route('admin.photo-galleries.index')->with('success', 'Photo updated successfully!');
    }

    public function destroy(string $id)
    {
        $photo = PhotoGallery::findOrFail($id);
        $photo->delete();
        return redirect()->route('admin.photo-galleries.index')->with('success', 'Photo deleted successfully!');
    }
}

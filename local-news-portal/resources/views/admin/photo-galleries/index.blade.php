@extends('admin.layout')

@section('title', 'Photo Gallery - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Photo Gallery</h1>
    <a href="{{ route('admin.photo-galleries.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add New Photo
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>
                                <img src="{{ asset($photo->thumbnail_path ?: $photo->image_path) }}" 
                                     alt="{{ $photo->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td>{{ Str::limit($photo->title, 50) }}</td>
                            <td>
                                @if($photo->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $photo->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.photo-galleries.edit', $photo->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('photo-gallery.show', $photo->slug) }}" 
                                       class="btn btn-sm btn-info" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.photo-galleries.destroy', $photo->id) }}" method="POST" 
                                          style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($photos->hasPages())
            <div class="d-flex justify-content-center">
                {{ $photos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
@extends('admin.layout')

@section('title', 'Video Gallery - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Video Gallery</h1>
    <a href="{{ route('admin.video-galleries.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add New Video
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td>
                                @if($video->thumbnail_path)
                                    <img src="{{ asset($video->thumbnail_path) }}" 
                                         alt="{{ $video->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                @else
                                    <div style="width: 60px; height: 60px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                        <i class="fa fa-video-camera" style="color: #ccc;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ Str::limit($video->title, 50) }}</td>
                            <td>
                                <span class="badge badge-info">{{ strtoupper($video->video_type) }}</span>
                            </td>
                            <td>
                                @if($video->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $video->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.video-galleries.edit', $video->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('video-gallery.show', $video->slug) }}" 
                                       class="btn btn-sm btn-info" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.video-galleries.destroy', $video->id) }}" method="POST" 
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
        
        @if($videos->hasPages())
            <div class="d-flex justify-content-center">
                {{ $videos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
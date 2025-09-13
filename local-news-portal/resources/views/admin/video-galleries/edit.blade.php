@extends('admin.layout')

@section('title', 'Edit Video - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Video</h1>
    <a href="{{ route('admin.video-galleries.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Back to Videos
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.video-galleries.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $video->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="video_url">Video URL *</label>
                        <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                               id="video_url" name="video_url" value="{{ old('video_url', $video->video_url) }}" 
                               placeholder="https://www.youtube.com/watch?v=..." required>
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Enter YouTube, Vimeo, or direct video URL</small>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description', $video->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="video_type">Video Type *</label>
                        <select class="form-control @error('video_type') is-invalid @enderror" 
                                id="video_type" name="video_type" required>
                            <option value="">Select Type</option>
                            <option value="youtube" {{ old('video_type', $video->video_type) == 'youtube' ? 'selected' : '' }}>YouTube</option>
                            <option value="vimeo" {{ old('video_type', $video->video_type) == 'vimeo' ? 'selected' : '' }}>Vimeo</option>
                            <option value="local" {{ old('video_type', $video->video_type) == 'local' ? 'selected' : '' }}>Local/Other</option>
                        </select>
                        @error('video_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($video->thumbnail_path)
                        <div class="form-group">
                            <label>Current Thumbnail</label>
                            <div>
                                <img src="{{ asset($video->thumbnail_path) }}" alt="{{ $video->title }}" 
                                     style="max-width: 200px; height: auto; border-radius: 5px;">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="thumbnail">New Thumbnail (Optional)</label>
                        <input type="file" class="form-control-file @error('thumbnail') is-invalid @enderror" 
                               id="thumbnail" name="thumbnail" accept="image/*">
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sort_order">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" 
                               value="{{ old('sort_order', $video->sort_order) }}">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                   {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-save"></i> Update Video
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
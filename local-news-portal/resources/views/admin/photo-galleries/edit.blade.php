@extends('admin.layout')

@section('title', 'Edit Photo - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Photo</h1>
    <a href="{{ route('admin.photo-galleries.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Back to Photos
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.photo-galleries.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $photo->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description', $photo->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    @if($photo->image_path)
                        <div class="form-group">
                            <label>Current Photo</label>
                            <div>
                                <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" 
                                     style="max-width: 200px; height: auto; border-radius: 5px;">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="image">New Photo</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sort_order">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" 
                               value="{{ old('sort_order', $photo->sort_order) }}">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                   {{ old('is_active', $photo->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-save"></i> Update Photo
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', $photo->title . ' | ফটো গ্যালারি | News Narayanganj')
@section('og_title', $photo->title)
@section('og_description', $photo->description ?: 'ফটো গ্যালারি - ' . $photo->title)
@section('og_image', asset($photo->image_path))

@section('content')
<section class="photo-detail-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-8">
                <div class="photo-detail" style="background: #fff; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                    <div class="photo-meta" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                        <span class="photo-badge" style="background: #1da255; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                            ফটো গ্যালারি
                        </span>
                        <span style="margin-left: 15px; color: #666; font-size: 14px;">
                            <i class="fa fa-calendar" aria-hidden="true"></i> 
                            {{ $photo->created_at->format('d M Y, h:i A') }}
                        </span>
                    </div>
                    
                    <h1 style="color: #333; margin-bottom: 20px; line-height: 1.4;">{{ $photo->title }}</h1>
                    
                    <div class="photo-image" style="margin-bottom: 25px; text-align: center;">
                        <a href="{{ asset($photo->image_path) }}" data-lightbox="{{ $photo->slug }}" data-title="{{ $photo->title }}">
                            <img src="{{ asset($photo->image_path) }}" class="img-fluid" alt="{{ $photo->title }}" 
                                 style="max-width: 100%; border-radius: 5px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);" />
                        </a>
                    </div>
                    
                    @if($photo->description)
                        <div class="photo-description" style="font-size: 16px; line-height: 1.8; color: #444; margin-bottom: 25px;">
                            {{ $photo->description }}
                        </div>
                    @endif
                    
                    <div class="photo-footer" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                        <div class="social-share">
                            <h5>শেয়ার করুন:</h5>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($photo->title) }}" 
                               target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="sidebar">
                    @if($relatedPhotos->count() > 0)
                        <div class="related-photos" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; margin-bottom: 30px;">
                            <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">আরও ছবি</h4>
                            @foreach($relatedPhotos as $related)
                                <div class="related-item" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{ route('photo-gallery.show', $related->slug) }}">
                                                <img src="{{ asset($related->thumbnail_path ?: $related->image_path) }}" 
                                                     class="img-fluid" alt="{{ $related->title }}" 
                                                     style="width: 100%; height: 60px; object-fit: cover; border-radius: 3px;" />
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <h6 style="margin: 0; font-size: 14px; line-height: 1.3;">
                                                <a href="{{ route('photo-gallery.show', $related->slug) }}" 
                                                   style="color: #333; text-decoration: none;">{{ Str::limit($related->title, 60) }}</a>
                                            </h6>
                                            <small style="color: #999;">{{ $related->created_at->format('d M Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                    <div class="back-to-gallery" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                        <a href="{{ route('photo-gallery.index') }}" class="btn btn-primary btn-block">
                            <i class="fa fa-arrow-left"></i> ফটো গ্যালারিতে ফিরুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('asset/css/lightbox.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('asset/js/lightbox.js') }}"></script>
@endpush
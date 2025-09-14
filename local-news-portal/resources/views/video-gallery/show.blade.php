@extends('layouts.app')

@section('title', $video->title . ' | ভিডিও গ্যালারি | News Narayanganj')
@section('og_title', $video->title)
@section('og_description', $video->description ?: 'ভিডিও গ্যালারি - ' . $video->title)
@section('og_image', $video->thumbnail_path ? asset($video->thumbnail_path) : asset('media/common/newsnarayanganj24.jpg'))

@section('content')
<section class="video-detail-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-8">
                <div class="video-detail" style="background: #fff; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                    <div class="video-meta" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                        <span class="video-badge" style="background: #dc3545; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                            ভিডিও গ্যালারি
                        </span>
                        <span class="video-type" style="background: #6c757d; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px; margin-left: 10px;">
                            {{ strtoupper($video->video_type) }}
                        </span>
                        <span style="margin-left: 15px; color: #666; font-size: 14px;">
                            <i class="fa fa-calendar" aria-hidden="true"></i> 
                            {{ $video->created_at->format('d M Y, h:i A') }}
                        </span>
                    </div>
                    
                    <h1 style="color: #333; margin-bottom: 20px; line-height: 1.4;">{{ $video->title }}</h1>
                    
                    <div class="video-player" style="margin-bottom: 25px;">
                        @if($video->video_type === 'youtube' || $video->video_type === 'vimeo')
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $video->embed_url }}" 
                                        allowfullscreen style="border-radius: 5px;"></iframe>
                            </div>
                        @else
                            <video controls class="w-100" style="border-radius: 5px;">
                                <source src="{{ $video->video_url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                    
                    @if($video->description)
                        <div class="video-description" style="font-size: 16px; line-height: 1.8; color: #444; margin-bottom: 25px;">
                            {{ $video->description }}
                        </div>
                    @endif
                    
                    <div class="video-footer" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                        <div class="social-share">
                            <h5>শেয়ার করুন:</h5>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($video->title) }}" 
                               target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="sidebar">
                    @if($relatedVideos->count() > 0)
                        <div class="related-videos" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; margin-bottom: 30px;">
                            <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">আরও ভিডিও</h4>
                            @foreach($relatedVideos as $related)
                                <div class="related-item" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{ route('video-gallery.show', $related->slug) }}">
                                                @if($related->thumbnail_path)
                                                    <img src="{{ asset($related->thumbnail_path) }}" 
                                                         class="img-fluid" alt="{{ $related->title }}" 
                                                         style="width: 100%; height: 60px; object-fit: cover; border-radius: 3px;" />
                                                @else
                                                    <div style="width: 100%; height: 60px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 3px;">
                                                        <i class="fa fa-video-camera" style="color: #ccc;"></i>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <h6 style="margin: 0; font-size: 14px; line-height: 1.3;">
                                                <a href="{{ route('video-gallery.show', $related->slug) }}" 
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
                        <a href="{{ route('video-gallery.index') }}" class="btn btn-primary btn-block">
                            <i class="fa fa-arrow-left"></i> ভিডিও গ্যালারিতে ফিরুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
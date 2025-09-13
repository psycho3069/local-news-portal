@extends('layouts.app')

@section('title', 'ভিডিও গ্যালারি | News Narayanganj')

@section('content')
<section class="video-gallery-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-12">
                <div class="gallery-header" style="margin-bottom: 30px;">
                    <h1 style="color: #1da255; border-bottom: 3px solid #1da255; padding-bottom: 10px; display: inline-block;">ভিডিও গ্যালারি</h1>
                    <p style="margin-top: 15px; color: #666;">আমাদের সংগৃহীত ভিডিওসমূহ</p>
                </div>
            </div>
        </div>
        
        <div class="row custom-row">
            @if($videos->count() > 0)
                @foreach($videos as $video)
                    <div class="col-md-4 col-sm-6 custom-padding" style="margin-bottom: 30px;">
                        <div class="video-item" style="background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; overflow: hidden;">
                            <div class="video-thumbnail" style="position: relative;">
                                <a href="{{ route('video-gallery.show', $video->slug) }}">
                                    @if($video->thumbnail_path)
                                        <img src="{{ asset($video->thumbnail_path) }}" 
                                             class="img-fluid" alt="{{ $video->title }}" 
                                             style="width: 100%; height: 200px; object-fit: cover;" />
                                    @else
                                        <div style="width: 100%; height: 200px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa fa-video-camera" style="font-size: 48px; color: #ccc;"></i>
                                        </div>
                                    @endif
                                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0,0,0,0.7); border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa fa-play" style="color: white; font-size: 20px; margin-left: 3px;"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="video-content" style="padding: 15px;">
                                <h4 style="margin-bottom: 10px; font-size: 16px; line-height: 1.4;">
                                    <a href="{{ route('video-gallery.show', $video->slug) }}" 
                                       style="color: #333; text-decoration: none;">{{ $video->title }}</a>
                                </h4>
                                @if($video->description)
                                    <p style="color: #666; font-size: 13px; margin-bottom: 10px;">
                                        {{ Str::limit($video->description, 80) }}
                                    </p>
                                @endif
                                <div class="meta" style="font-size: 11px; color: #999;">
                                    <span class="video-type" style="background: #dc3545; color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; margin-right: 10px;">
                                        {{ strtoupper($video->video_type) }}
                                    </span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{ $video->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="no-videos" style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 10px;">
                        <i class="fa fa-video-camera" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                        <h3 style="color: #666; margin-bottom: 15px;">কোনো ভিডিও পাওয়া যায়নি</h3>
                        <p style="color: #999;">এখনো কোনো ভিডিও আপলোড করা হয়নি।</p>
                    </div>
                </div>
            @endif
        </div>
        
        @if($videos->hasPages())
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-wrapper" style="text-align: center; margin-top: 30px;">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
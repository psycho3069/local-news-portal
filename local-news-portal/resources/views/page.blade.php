@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title . ' | News Narayanganj')
@section('og_title', $page->title)
@section('og_description', $page->meta_description ?: Str::limit(strip_tags($page->content), 160))

@section('content')
<section class="page-content-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-8">
                <div class="page-content" style="background: #fff; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                    <h1 style="color: #1da255; margin-bottom: 30px; border-bottom: 3px solid #1da255; padding-bottom: 15px;">{{ $page->title }}</h1>
                    
                    <div class="page-body" style="font-size: 16px; line-height: 1.8; color: #444;">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="categories-widget" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; margin-bottom: 30px;">
                        <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">সংবাদ বিভাগ</h4>
                        @foreach($categories as $category)
                            <div style="margin-bottom: 10px;">
                                <a href="{{ route('category.show', $category->slug) }}" 
                                   style="color: #333; text-decoration: none; display: block; padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                    <i class="fa fa-angle-right" style="margin-right: 8px; color: #1da255;"></i>
                                    {{ $category->name_bn }}
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="quick-links" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                        <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">দ্রুত লিংক</h4>
                        <div style="margin-bottom: 10px;">
                            <a href="{{ route('home') }}" 
                               style="color: #333; text-decoration: none; display: block; padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                <i class="fa fa-home" style="margin-right: 8px; color: #1da255;"></i>
                                হোম পেজ
                            </a>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <a href="{{ route('photo-gallery.index') }}" 
                               style="color: #333; text-decoration: none; display: block; padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                <i class="fa fa-image" style="margin-right: 8px; color: #1da255;"></i>
                                ফটো গ্যালারি
                            </a>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <a href="{{ route('video-gallery.index') }}" 
                               style="color: #333; text-decoration: none; display: block; padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                <i class="fa fa-video-camera" style="margin-right: 8px; color: #1da255;"></i>
                                ভিডিও গ্যালারি
                            </a>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <a href="{{ route('archives') }}" 
                               style="color: #333; text-decoration: none; display: block; padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                <i class="fa fa-archive" style="margin-right: 8px; color: #1da255;"></i>
                                আর্কাইভ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
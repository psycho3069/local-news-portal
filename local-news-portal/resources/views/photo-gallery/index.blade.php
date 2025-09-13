@extends('layouts.app')

@section('title', 'ফটো গ্যালারি | News Narayanganj')

@section('content')
<section class="photo-gallery-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-12">
                <div class="gallery-header" style="margin-bottom: 30px;">
                    <h1 style="color: #1da255; border-bottom: 3px solid #1da255; padding-bottom: 10px; display: inline-block;">ফটো গ্যালারি</h1>
                    <p style="margin-top: 15px; color: #666;">আমাদের সংগৃহীত ছবিসমূহ</p>
                </div>
            </div>
        </div>
        
        <div class="row custom-row">
            @if($photos->count() > 0)
                @foreach($photos as $photo)
                    <div class="col-md-4 col-sm-6 custom-padding" style="margin-bottom: 30px;">
                        <div class="photo-item" style="background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; overflow: hidden;">
                            <div class="photo-image">
                                <a href="{{ route('photo-gallery.show', $photo->slug) }}">
                                    <img src="{{ asset($photo->thumbnail_path ?: $photo->image_path) }}" 
                                         class="img-fluid" alt="{{ $photo->title }}" 
                                         style="width: 100%; height: 200px; object-fit: cover;" />
                                </a>
                            </div>
                            <div class="photo-content" style="padding: 15px;">
                                <h4 style="margin-bottom: 10px; font-size: 16px; line-height: 1.4;">
                                    <a href="{{ route('photo-gallery.show', $photo->slug) }}" 
                                       style="color: #333; text-decoration: none;">{{ $photo->title }}</a>
                                </h4>
                                @if($photo->description)
                                    <p style="color: #666; font-size: 13px; margin-bottom: 10px;">
                                        {{ Str::limit($photo->description, 80) }}
                                    </p>
                                @endif
                                <div class="meta" style="font-size: 11px; color: #999;">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{ $photo->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="no-photos" style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 10px;">
                        <i class="fa fa-image" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                        <h3 style="color: #666; margin-bottom: 15px;">কোনো ছবি পাওয়া যায়নি</h3>
                        <p style="color: #999;">এখনো কোনো ছবি আপলোড করা হয়নি।</p>
                    </div>
                </div>
            @endif
        </div>
        
        @if($photos->hasPages())
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-wrapper" style="text-align: center; margin-top: 30px;">
                        {{ $photos->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('asset/css/lightbox.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('asset/js/lightbox.js') }}"></script>
@endpush
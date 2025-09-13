@extends('layouts.app')

@section('title', $category->name_bn . ' | News Narayanganj')

@section('content')
<section class="category-news-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-12">
                <div class="category-header" style="margin-bottom: 30px;">
                    <h1 style="color: #1da255; border-bottom: 3px solid #1da255; padding-bottom: 10px; display: inline-block;">{{ $category->name_bn }}</h1>
                </div>
            </div>
        </div>
        
        <div class="row custom-row">
            @foreach($articles as $article)
                <div class="col-md-4 col-sm-6 custom-padding" style="margin-bottom: 30px;">
                    <div class="category-news-item" style="background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; overflow: hidden;">
                        <div class="category-news-image">
                            <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" 
                                     class="img-fluid" alt="{{ $article->title }}" style="width: 100%; height: 200px; object-fit: cover;" />
                            </a>
                        </div>
                        <div class="category-news-content" style="padding: 15px;">
                            <h3 style="margin-bottom: 10px; font-size: 18px; line-height: 1.4;">
                                <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}" 
                                   style="color: #333; text-decoration: none;">{{ $article->title }}</a>
                            </h3>
                            <p style="color: #666; font-size: 14px; margin-bottom: 10px;">
                                {{ Str::limit(strip_tags($article->excerpt ?: $article->content), 100) }}
                            </p>
                            <div class="meta" style="font-size: 12px; color: #999;">
                                <i class="fa fa-calendar" aria-hidden="true"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                                <span style="margin-left: 15px;">
                                    <i class="fa fa-eye" aria-hidden="true"></i> {{ $article->views }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if($articles->hasPages())
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-wrapper" style="text-align: center; margin-top: 30px;">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
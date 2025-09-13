@extends('layouts.app')

@section('title', $article->title . ' | News Narayanganj')
@section('og_title', $article->title)
@section('og_description', Str::limit(strip_tags($article->excerpt ?: $article->content), 160))
@section('og_image', $article->featured_image ? asset($article->featured_image) : asset('media/common/newsnarayanganj24.jpg'))

@section('content')
<section class="article-detail-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-8">
                <article class="article-content" style="background: #fff; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                    <div class="article-meta" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                        <span class="category-badge" style="background: #1da255; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                            <a href="{{ route('category.show', $article->category->slug) }}" style="color: white; text-decoration: none;">
                                {{ $article->category->name_bn }}
                            </a>
                        </span>
                        <span style="margin-left: 15px; color: #666; font-size: 14px;">
                            <i class="fa fa-calendar" aria-hidden="true"></i> 
                            {{ $article->published_at ? $article->published_at->format('d M Y, h:i A') : $article->created_at->format('d M Y, h:i A') }}
                        </span>
                        <span style="margin-left: 15px; color: #666; font-size: 14px;">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{ $article->views }} বার পড়া হয়েছে
                        </span>
                    </div>
                    
                    <h1 style="color: #333; margin-bottom: 20px; line-height: 1.4;">{{ $article->title }}</h1>
                    
                    @if($article->featured_image)
                        <div class="article-image" style="margin-bottom: 25px;">
                            <img src="{{ asset($article->featured_image) }}" class="img-fluid" alt="{{ $article->title }}" 
                                 style="width: 100%; border-radius: 5px;" />
                        </div>
                    @endif
                    
                    @if($article->excerpt)
                        <div class="article-excerpt" style="font-size: 18px; color: #555; margin-bottom: 25px; font-weight: 500; line-height: 1.6;">
                            {{ $article->excerpt }}
                        </div>
                    @endif
                    
                    <div class="article-body" style="font-size: 16px; line-height: 1.8; color: #444;">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                    
                    <div class="article-footer" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                        <div class="social-share">
                            <h5>শেয়ার করুন:</h5>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" 
                               target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            
            <div class="col-md-4">
                <div class="sidebar">
                    @if($relatedArticles->count() > 0)
                        <div class="related-articles" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; margin-bottom: 30px;">
                            <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">সম্পর্কিত খবর</h4>
                            @foreach($relatedArticles as $related)
                                <div class="related-item" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{ route('article.show', [$related->category->slug, $related->slug]) }}">
                                                <img src="{{ $related->featured_image ? asset($related->featured_image) : asset('media/common/default-news.jpg') }}" 
                                                     class="img-fluid" alt="{{ $related->title }}" style="width: 100%; height: 60px; object-fit: cover; border-radius: 3px;" />
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <h6 style="margin: 0; font-size: 14px; line-height: 1.3;">
                                                <a href="{{ route('article.show', [$related->category->slug, $related->slug]) }}" 
                                                   style="color: #333; text-decoration: none;">{{ Str::limit($related->title, 60) }}</a>
                                            </h6>
                                            <small style="color: #999;">{{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
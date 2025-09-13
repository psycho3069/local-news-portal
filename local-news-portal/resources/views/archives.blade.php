@extends('layouts.app')

@section('title', 'আর্কাইভ | News Narayanganj')

@section('content')
<section class="archives-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-12">
                <div class="archives-header" style="margin-bottom: 30px;">
                    <h1 style="color: #1da255; border-bottom: 3px solid #1da255; padding-bottom: 10px; display: inline-block;">আর্কাইভ</h1>
                    <p style="margin-top: 15px; color: #666;">সকল প্রকাশিত সংবাদের সংগ্রহ</p>
                </div>
            </div>
        </div>
        
        <div class="row custom-row">
            <div class="col-md-8">
                <div class="archives-filter" style="background: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 30px;">
                    <form action="{{ route('archives') }}" method="get" class="row">
                        <div class="col-md-4">
                            <select name="category" class="form-control">
                                <option value="">সকল বিভাগ</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name_bn }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="month" name="month" class="form-control" value="{{ request('month') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-filter"></i> ফিল্টার করুন
                            </button>
                        </div>
                    </form>
                </div>

                <div class="archives-results">
                    @foreach($articles as $article)
                        <div class="archive-item" style="background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; overflow: hidden; margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="archive-item-image">
                                        <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                            <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" 
                                                 class="img-fluid" alt="{{ $article->title }}" style="width: 100%; height: 120px; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="archive-item-content" style="padding: 15px;">
                                        <h4 style="margin-bottom: 10px; font-size: 16px; line-height: 1.4;">
                                            <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}" 
                                               style="color: #333; text-decoration: none;">{{ $article->title }}</a>
                                        </h4>
                                        <p style="color: #666; font-size: 13px; margin-bottom: 10px;">
                                            {{ Str::limit(strip_tags($article->excerpt ?: $article->content), 120) }}
                                        </p>
                                        <div class="meta" style="font-size: 11px; color: #999;">
                                            <span class="category-badge" style="background: #1da255; color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; margin-right: 10px;">
                                                {{ $article->category->name_bn }}
                                            </span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                                            <span style="margin-left: 15px;">
                                                <i class="fa fa-eye" aria-hidden="true"></i> {{ $article->views }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    @if($articles->hasPages())
                        <div class="pagination-wrapper" style="text-align: center; margin-top: 30px;">
                            {{ $articles->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="archive-stats" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; margin-bottom: 30px;">
                        <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">পরিসংখ্যান</h4>
                        <div style="margin-bottom: 15px;">
                            <strong>মোট সংবাদ:</strong> {{ $articles->total() }} টি
                        </div>
                        <div style="margin-bottom: 15px;">
                            <strong>মোট বিভাগ:</strong> {{ $categories->count() }} টি
                        </div>
                    </div>

                    <div class="categories-list" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px;">
                        <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">বিভাগসমূহ</h4>
                        @foreach($categories as $category)
                            <div style="margin-bottom: 10px;">
                                <a href="{{ route('archives') }}?category={{ $category->slug }}" 
                                   style="color: #333; text-decoration: none; display: block; padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                    <i class="fa fa-angle-right" style="margin-right: 8px; color: #1da255;"></i>
                                    {{ $category->name_bn }}
                                    <span style="float: right; color: #999; font-size: 12px;">
                                        ({{ $category->publishedArticles->count() }})
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
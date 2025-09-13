@extends('layouts.app')

@section('title', 'অনুসন্ধান: ' . $query . ' | News Narayanganj')

@section('content')
<section class="search-results-wrapper" style="padding: 40px 0;">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="col-md-12">
                <div class="search-header" style="margin-bottom: 30px;">
                    @if($query)
                        <h1 style="color: #1da255; border-bottom: 3px solid #1da255; padding-bottom: 10px; display: inline-block;">
                            অনুসন্ধানের ফলাফল: "{{ $query }}"
                        </h1>
                        <p style="margin-top: 15px; color: #666;">
                            {{ $articles->total() }} টি ফলাফল পাওয়া গেছে
                        </p>
                    @else
                        <h1 style="color: #1da255; border-bottom: 3px solid #1da255; padding-bottom: 10px; display: inline-block;">
                            অনুসন্ধান করুন
                        </h1>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row custom-row">
            <div class="col-md-8">
                @if($query && $articles->count() > 0)
                    @foreach($articles as $article)
                        <div class="search-result-item" style="background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; overflow: hidden; margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="search-result-image">
                                        <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                            <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" 
                                                 class="img-fluid" alt="{{ $article->title }}" style="width: 100%; height: 150px; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="search-result-content" style="padding: 15px;">
                                        <h3 style="margin-bottom: 10px; font-size: 18px; line-height: 1.4;">
                                            <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}" 
                                               style="color: #333; text-decoration: none;">{{ $article->title }}</a>
                                        </h3>
                                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">
                                            {{ Str::limit(strip_tags($article->excerpt ?: $article->content), 150) }}
                                        </p>
                                        <div class="meta" style="font-size: 12px; color: #999;">
                                            <span class="category-badge" style="background: #1da255; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; margin-right: 10px;">
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
                            {{ $articles->appends(['q' => $query])->links() }}
                        </div>
                    @endif
                @elseif($query)
                    <div class="no-results" style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 10px;">
                        <i class="fa fa-search" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                        <h3 style="color: #666; margin-bottom: 15px;">কোনো ফলাফল পাওয়া যায়নি</h3>
                        <p style="color: #999;">দুঃখিত, "{{ $query }}" এর জন্য কোনো খবর পাওয়া যায়নি। অন্য কিছু খুঁজে দেখুন।</p>
                    </div>
                @else
                    <div class="search-form-section" style="background: #f8f9fa; padding: 40px; border-radius: 10px; text-align: center;">
                        <h3 style="margin-bottom: 20px; color: #333;">খবর খুঁজুন</h3>
                        <form action="{{ route('search') }}" method="get" style="max-width: 500px; margin: 0 auto;">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="খবর খুঁজতে লিখুন..." style="height: 50px; font-size: 16px;">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" style="height: 50px; padding: 0 20px;">
                                        <i class="fa fa-search"></i> খুঁজুন
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
            
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="popular-searches" style="background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 5px; margin-bottom: 30px;">
                        <h4 style="color: #1da255; margin-bottom: 20px; border-bottom: 2px solid #1da255; padding-bottom: 10px;">জনপ্রিয় বিভাগ</h4>
                        @foreach($categories->take(8) as $category)
                            <a href="{{ route('category.show', $category->slug) }}" 
                               style="display: inline-block; background: #f8f9fa; color: #333; padding: 5px 10px; margin: 3px; border-radius: 15px; text-decoration: none; font-size: 12px; border: 1px solid #e9ecef;">
                                {{ $category->name_bn }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
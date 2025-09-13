@extends('layouts.app')

@section('content')
<section class="lead-news-wrapper">
    <div class="container custom-container">
        <div class="row custom-row">
            <div class="lead-news-left">
                <div class="col-md-12 col-lg-12 custom-padding">
                    <div class="row custom-row">
                        @if($featuredArticles->count() > 0)
                            <div class="col-md-8 custom-padding">
                                <div class="new-lead-news-wrapper">
                                    <div class="new-lead-news">
                                        <a href="{{ route('article.show', [$featuredArticles->first()->category->slug, $featuredArticles->first()->slug]) }}">
                                            <div class="lead-news-image">
                                                <img src="{{ $featuredArticles->first()->featured_image ? asset($featuredArticles->first()->featured_image) : asset('media/common/default-news.jpg') }}" class="img-fluid" alt="{{ $featuredArticles->first()->title }}" />
                                            </div>
                                            <div class="new-lead-news-heading">
                                                <h1>{{ $featuredArticles->first()->title }}</h1>
                                                {{ Str::limit(strip_tags($featuredArticles->first()->excerpt ?: $featuredArticles->first()->content), 200) }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="meta">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i> 
                                        <a href="{{ route('category.show', $featuredArticles->first()->category->slug) }}">{{ $featuredArticles->first()->category->name_bn }}</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 custom-padding">
                                <div class="row custom-row">
                                    @foreach($featuredArticles->skip(1)->take(2) as $article)
                                        <div class="col-md-12 col-6 custom-padding">
                                            <div class="lead-news-other-wrapper">
                                                <div class="lead-news-other">
                                                    <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                                        <div class="lead-news-other-image">
                                                            <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" class="img-fluid" alt="{{ $article->title }}" />
                                                        </div>
                                                        <div class="lead-news-other-heading">
                                                            <h2>{{ $article->title }}</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="meta">
                                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> 
                                                    <a href="{{ route('category.show', $article->category->slug) }}">{{ $article->category->name_bn }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row custom-row other-lead-row">
                        @foreach($featuredArticles->skip(3)->take(6) as $article)
                            <div class="col-md-4 col-6 custom-padding">
                                <div class="lead-news-second-wrapper">
                                    <div class="lead-news-second">
                                        <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                            <div class="lead-news-second-image">
                                                <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" class="img-fluid" alt="{{ $article->title }}" />
                                            </div>
                                            <div class="lead-news-second-heading">
                                                <h3>{{ $article->title }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="meta">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i> 
                                        <a href="{{ route('category.show', $article->category->slug) }}">{{ $article->category->name_bn }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="lead-news-right">
                <div class="col-md-12 custom-padding">
                    <div class="new-tab-style-3">
                        <div class="right-main-tab right-main-tab-style-2">
                            <ul class="nav nav-pills side-tab-main new-style-tab" id="pills-tab" role="tablist" style="margin-top:0;">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                      aria-controls="pills-home" aria-selected="true">সর্বশেষ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                      aria-controls="pills-profile" aria-selected="false">জনপ্রিয়</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content new-page-style-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="least-news">
                                        <ul class="least-news-ul" style="max-height:405px;">
                                            @foreach($latestArticles as $article)
                                                <li>
                                                    <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                                        <div class="least-news-left">
                                                            <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" class="img-fluid" alt="{{ $article->title }}" />
                                                        </div>
                                                        <div class="least-news-right">
                                                            <h3>{{ $article->title }}</h3>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="least-news">
                                        <ul class="least-news-ul">
                                            @foreach($latestArticles->sortByDesc('views')->take(10) as $article)
                                                <li>
                                                    <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}">
                                                        <div class="least-news-left">
                                                            <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" class="img-fluid" alt="{{ $article->title }}" />
                                                        </div>
                                                        <div class="least-news-right">
                                                            <h3>{{ $article->title }}</h3>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
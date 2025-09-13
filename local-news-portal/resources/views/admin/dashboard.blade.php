@extends('admin.layout')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Dashboard</h1>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalArticles }}</h4>
                        <p class="mb-0">Total Articles</p>
                    </div>
                    <div>
                        <i class="fa fa-newspaper-o fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $publishedArticles }}</h4>
                        <p class="mb-0">Published</p>
                    </div>
                    <div>
                        <i class="fa fa-check fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $featuredArticles }}</h4>
                        <p class="mb-0">Featured</p>
                    </div>
                    <div>
                        <i class="fa fa-star fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalCategories }}</h4>
                        <p class="mb-0">Categories</p>
                    </div>
                    <div>
                        <i class="fa fa-folder fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-secondary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalPhotos }}</h4>
                        <p class="mb-0">Photos</p>
                    </div>
                    <div>
                        <i class="fa fa-image fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalVideos }}</h4>
                        <p class="mb-0">Videos</p>
                    </div>
                    <div>
                        <i class="fa fa-video-camera fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-purple" style="background-color: #6f42c1 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalPages }}</h4>
                        <p class="mb-0">Pages</p>
                    </div>
                    <div>
                        <i class="fa fa-file-text fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ \App\Models\Setting::count() }}</h4>
                        <p class="mb-0">Settings</p>
                    </div>
                    <div>
                        <i class="fa fa-cog fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Recent Articles</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentArticles as $article)
                                <tr>
                                    <td>{{ Str::limit($article->title, 50) }}</td>
                                    <td>{{ $article->category->name_bn }}</td>
                                    <td>
                                        @if($article->is_published)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-secondary">Draft</span>
                                        @endif
                                        @if($article->is_featured)
                                            <span class="badge badge-warning">Featured</span>
                                        @endif
                                    </td>
                                    <td>{{ $article->views }}</td>
                                    <td>{{ $article->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}" 
                                           class="btn btn-sm btn-info" target="_blank">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
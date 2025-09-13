@extends('admin.layout')

@section('title', 'Articles - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Articles</h1>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add New Article
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('media/common/default-news.jpg') }}" 
                                     alt="{{ $article->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            </td>
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
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}" 
                                       class="btn btn-sm btn-info" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" 
                                          style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($articles->hasPages())
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
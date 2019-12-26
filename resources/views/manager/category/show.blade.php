@extends('layouts.app')

@section('title')
    {{ $category->title }}
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <h1 class="my-4">News List
            </h1>

            <!-- Blog Post -->
            @forelse($news as $news_list)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $news_list->title }}</h2>
                        <p class="card-text">{{ $news_list->description }}</p>
                        <a href="{{ route('news', $news_list->id) }}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $news_list->created_at }}
                        by {{ get_user_name($news_list->author) }}
                    </div>
                </div>
            @empty
                Here will be news
            @endforelse

            <div>
                {{ $news->links() }}
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">


            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('category', $category->id) }}">{{ $category->title }}</a>
                            </li>
                        @empty
                            Here will be categories
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection

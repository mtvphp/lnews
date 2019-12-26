@extends('layouts.app')

@section('title')
    Manager | Add News
@endsection

@section('content')
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{ $news->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by {{ get_user_name($news->author) }}
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ $news->created_at }}</p>


            <p>{{ $news->description }}</p>

            <hr>



        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">


            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('category', $category) }}">{{ $category->title }}</a>
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

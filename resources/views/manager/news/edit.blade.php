@extends('layouts.app')

@section('title')
    Manager | Edit News
@endsection

@section('content')

    <div class="col-sm-6 offset-sm-3">
        @include('manager.components.flash')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('manager') }}">Manager</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit news</li>
            </ol>
        </nav>

        <form method="post" action="{{ route('manager.news.update', $news->id) }}">

            @csrf

            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" id="title" placeholder="Title min:4" name="title" value="{{ $news->title }}"/>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" placeholder="Description min:12" id="description">{{ $news->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">-- select a category --</option>
                    @foreach($categories as $category)
                        <option @if($news->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Edit news</button>
        </form>
    </div>

@endsection

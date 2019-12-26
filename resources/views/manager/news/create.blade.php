@extends('layouts.app')

@section('title')
    Manager | Add News
@endsection

@section('content')

    <div class="col-sm-6 offset-sm-3">
        @include('manager.components.flash')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('manager') }}">Manager</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add news</li>
            </ol>
        </nav>

        <form method="post" action="{{ route('manager.news.store') }}">

            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Title min:4"/>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control custom-select" name="category_id" id="category_id">
                    <option value="0">-- select a category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" placeholder="Description min:12"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Add news</button>
        </form>
    </div>
@endsection

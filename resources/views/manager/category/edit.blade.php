@extends('layouts.app')

@section('title')
    Manager | Edit Category
@endsection

@section('content')

    <div class="col-sm-6 offset-sm-3">
        @include('manager.components.flash')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('manager') }}">Manager</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit category</li>
            </ol>
        </nav>

        <form method="post" action="{{ route('manager.category.update', $category->id) }}">

            @csrf

            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" placeholder="Title min:4 symbol"/>
            </div>

            <div class="form-group">
                <label for="order">Order:</label>
                <input type="number" min="0" class="form-control" id="order" name="order" value="{{ $category->order }}" placeholder="Order:is_numeric"/>
            </div>


            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection

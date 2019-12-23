@extends('layouts.app')

@section('title')
    Manager | Edit Category
@endsection

@section('content')

    <div class="col-sm-6 offset-sm-3">
        @include('manager.components.flash')

        <form method="post" action="{{ route('manager.category.update', $category->id) }}">

            @csrf

            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" placeholder="Title min:4 symbol"/>
            </div>


            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection

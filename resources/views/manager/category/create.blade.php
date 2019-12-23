@extends('layouts.app')

@section('title')
    Manager | Create Category
@endsection

@section('content')

    <div class="col-sm-6 offset-sm-3">

        @include('manager.components.flash')

        <form method="post" action="{{ route('manager.category.store') }}">

            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" id="title" type="text" name="title" placeholder="Title min:4 symbol"/>
            </div>


            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection

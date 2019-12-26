@extends('layouts.app')

@section('title')
    Manager | Create Category
@endsection

@section('content')
    <div class="col-sm-6 offset-sm-3">

        @include('manager.components.flash')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('manager') }}">Manager</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create category</li>
            </ol>
        </nav>


        <form method="post" action="{{ route('manager.category.store') }}">

            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" id="title" type="text" name="title" placeholder="Title min:4 symbol"/>
            </div>

            <div class="form-group">
                <label for="order">Order:</label>
                <input class="form-control" id="order" type="number" min="0" name="order" placeholder="Order:is_numeric" />
            </div>


            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection

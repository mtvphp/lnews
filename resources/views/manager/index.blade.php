@extends('layouts.app')

@section('title')
    Manager
@endsection

@section('content')
    <div>
        @include('manager.components.flash')
    </div>

    <div class="row">

        <div class="col-sm-4">
            <table class="table text">
                <tbody>
                <tr class="table-primary">
                    <td colspan="3">
                        <div class="d-flex justify-content-center align-items-center">
                            Do you want to create category? &nbsp; <a href="{{ route('manager.category.create') }}" class="btn btn-primary btn" role="button" aria-pressed="true">Create</a>
                        </div>
                    </td>
                </tr>
                    @forelse($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('manager.category.edit', $category->id) }}" class="btn btn-primary btn" role="button" aria-pressed="true"><i class="fas fa-pen"></i></a>
                                 &nbsp;
                                <form method="POST" action="{{ route('manager.category.destroy', [$category->id]) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button onclick="return confirm('Do you want to delete {{ $category->title }}')" class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="d-flex justify-content-center">
                                Here will be categories
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $categories->links() }}


        </div>

        <div class="col-sm-8">
            <div class="">
                <div class="text-right">
                    <a class="btn btn-success" href="{{ route('manager.news.create') }}" role="button"><i class="fas fa-plus-circle"></i></a>
                </div>
            </div>
            <div class="my-3 p-3 bg-white rounded shadow-sm">

                @forelse($news as $news_list)
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>{{ $news_list->title }}</strong>
                                <p>{{ $news_list->description }}</p>
                                <small>Category: {{ \App\Category::find($news_list->category_id)->title ?? 'none' }}</small>
                                <small class="d-block mt-3">
                                    <form style="display: inline-block" method="post" action="{{ route('manager.news.edit', $news_list->id) }}">
                                        @csrf
                                        {{ method_field('GET') }}
                                        <button type="submit" class="btn btn-link p-0 m-0">Edit</button>
                                    </form>
                                     |
                                    <form style="display: inline-block" method="post" action="{{ route('manager.news.destroy', [$news_list->id]) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button onclick="return confirm('Do you want to delete this news?')" type="submit" class="btn btn-link p-0 m-0">Delete</button>
                                    </form>
                                </small>
                            </li>
                        </ul>
                    </div>
                @empty
                    Here will be news
                @endforelse

                <small class="d-block text-right mt-3">
                    {{ $news->links() }}
                </small>
            </div>
        </div>
    </div>
@endsection

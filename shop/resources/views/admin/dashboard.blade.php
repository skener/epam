@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header">
        <h3>Books Admin Panel</h3>
    </div>

    <div>
        <a href="{{route('admin.book-form')}}">
            <button class="btn-block btn-primary">
                <h4>Create New Book</h4>
            </button>
        </a>
    </div>
    <div>
        <table class="table-bordered table-hover text-center">
            <tr class="text-center">
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($books as $book): ?>
            <tr>
                <td>
                    <a href="{{route('book.id', ['id'=>$book->id])}}">
                        <img src="{{$book->poster}}" alt="{{$book->name}}" class="media-object" width="50%">
                    </a>
                </td>
                <td>
                    <a href="{{route('book.id', ['id'=>$book->id])}}">{{$book->name}}</a>
                </td>

                <td> {{$book->author}}</td>

                <td><span class="text-success" style="font-size: large">{{$book->price}}</span></td>

                <td> {{$book->date->diffForHumans()}}</td>

                @if ($book->title)
                    <td>
                        @foreach ($book->title as $tag)
                            <span class="label label-primary">{{$tag }}</span>
                        @endforeach
                    </td>
                @endif
                <td>
                    <a href="{{route('book.id', ['id'=>$book->id])}}"
                       class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="{{route('admin.book-delete', ['id'=>$book->id])}}"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>


@endsection

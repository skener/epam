@extends('default')


@section('content')
    <p><h3>Your single book by ID:  {{$id}}</h3></p>
{{--{{dd($book['poster'])}}--}}
    <div class="media-left">

            <img src="{{$book['poster']}}" class="media-object">

    </div>
    <div class="media-body">
        <h4 class="media-heading">
            {{$book['name']}}
        </h4>

        <p><b>Author</b>:{{$book['author']}}</p>

        <p><b>Price</b>: <span class="text-success" style="font-size: large">{{$book['price']}}</span></p>

        <p><b>Date</b>: {{ $book['date']}}</p>

        @if($book['tags'])
            <p>
                <b>Tags</b>:
                @foreach ($book['tags'] as $tag)
                <span class="label label-primary">{{$tag['title']}}</span>
                @endforeach
            </p>
        @endif


    </div>

    <nav class="text-center">
        <ul class="pagination">

        </ul>
    </nav>

    </div>

@endsection
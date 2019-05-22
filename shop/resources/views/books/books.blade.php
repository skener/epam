@extends('default')

@section('content')

    <div class="media">
        @foreach($books as $key=>$book)
            <div class="media-left">
                <a href="{{route('book.id', ['id'=>$book['id']])}}">
                    <img src="{{$book['poster']}}" class="media-object">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <a href="{{route('book.id', ['id'=>$book['id']])}}">{{$book['name']}}</a>
                </h4>

                <p><b>Author</b>:{{$book['author']}}</p>

                <p><b>Price</b>: <span class="text-success" style="font-size: large">{{$book['price']}}</span></p>

                <p><b>Date</b>: {{ $book['date']}}</p>

                @if($book['tags'])

                    <p>
                        <b>Tags</b>:
                        @foreach ($book['tags'] as $tag):
                        <span class="label label-primary">{{$tag['title']}}</span>
                        @endforeach
                    </p>
                @endif

            </div>
        @endforeach
    </div>

        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{$books->links()}}"></a>
            </li>
        </ul>

@endsection
@extends('default')

@section('content')
    <div class="panel panel-default">
        @if(Session::has('Success'))
            <div class="alert alert-success" role="alert">
                {{--{{Session::get('Success')}}--}}
            </div>
        @endif

            @if ($errors->any())
                <div class=”alert alert-danger”>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <div class="panel-heading">
            Створити нову книгу
        </div>
        <div class="panel-body">
            <form action="{{route('admin.book-store')}}" method="post">
                {{csrf_field ()}}
                <div class="form-group">
                    <label for="title">Назва</label>
                    <input type="text" name="name" class="form-control" value="{{old ('name')}}">
                </div>
                <div class="form-group">
                    <label for="title">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Author Name">
                </div>
                <div class="form-group">
                    <label for="title">Date</label>
                    <input type="text" name="date" class="form-control" placeholder="2017-08-12">
                </div>
                <div class="form-group">
                    <label for="title">Price</label>
                    <input type="text" name="price" class="form-control" value="14">
                </div>
                <div class="form-group">
                    <label for="image">Зображення(url)</label>
                    <input type="text" name="poster" class="form-control"
                           value="https://images-na.ssl-images-amazon.com/images/I/51mIYYmtBQL._SX404_BO1,204,203,200_.jpg">
                </div>
                <div class="form-group">
                    <label for="category">Виберіть категорію</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">
                            Зберегти
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
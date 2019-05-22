<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>{{ config('app.name', '') }}</title>
s
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">
                    <span class="glyphicon glyphicon-book">BookShop</span>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-left" action="{{route('query.book')}}" method="get">
                    <div class="form-group">
                        <input placeholder="Search" name="q" value="" required class="form-control">
                    </div>
                    <button class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
    </nav>
    @if (Route::has('login'))
    <div class="top-right links">
    @auth
    <a href="{{ url('/home') }}">Назад</a>
    @else
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Зареєструватися</a>
    @endif
    @endauth
    </div>
    @endif
    <form action="{{route('sort')}}" method="get">
        <select name="tagSort">
            <option value="">choose</option>
            <option value="php">Php</option>
            <option value="javascript">Javascript</option>
            <option value="mysql">MySQL</option>
            <option value="jquery">Jquery</option>
        </select>
        <input type="submit" name="Sort" value="SortByTags">
    </form>
    <div class="container">
        @yield('content')
    </div>

    <hr>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">© Company, Inc.</p>
        </div>
    </footer>
</body>
</html>

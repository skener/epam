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
        <h3>Books User Panel</h3>
    </div>
    <div>

        <div class="card-body">
            @if(auth()->user()->admin == 1)
                <a href="{{route('admin.dashboard')}}">Admin</a>
            @else
                <div class=”panel-heading”>Normal User</div>
            @endif
        </div>

        {{--<a href="{{route('admin.dashboard')}}"><button class="btn btn-block">Admin</button></a>--}}
    </div>
@endsection

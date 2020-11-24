<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .layer1 {
            height: 10%;
            padding: 7px;
            border: 1px solid #ccc;
        }

    </style>
</head>
<bdy class="bg-light">

<div class="top-right links ">
    @auth
        <div class="row justify-content-md-center text-success">
            You are logged in as - {{ Auth::user()->email}}
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-2 col-sm-2 col-xs-12 text-center card alert alert-primary" role="alert">
                <a class="alert-link" href="{{ route('auth.logout') }}">Logout</a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 text-center card alert alert-primary" role="alert">
                <a class="alert-link" href="{{ route('basket.create') }}">Корзина -
                    {{\App\Models\Basket::getCountAmount(Auth::user()->id)}} тов.</a>
                {{Session::get('status_empty')}}
            </div>
        </div>
    @else
        <div class="row justify-content-md-center">
            <div class="col-md-2 col-sm-2 col-xs-12 text-center card alert alert-primary" role="alert">
                <a class="alert-link" href="{{ route('auth.login') }}">Login</a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 text-center card alert alert-primary" role="alert">
                <a class="alert-link" href="{{ route('register') }}">Register</a>
            </div>
        </div>
    @endauth
</div>

@yield('content')

</bdy>

<div class="card-footer">
    <a href="{{ url('/') }}">Main</a>
</div>
</html>

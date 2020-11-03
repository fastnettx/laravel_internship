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
</head>
<body>

    <div class="top-right links">
        @auth
            You are logged in as - {{ Auth::user()->email}}
            <div class="flex justify-right pt-3 sm:justify-start sm:pt-0">
                <a href="{{ route('auth.login') }}">Logout</a>
            </div>
            <div class="flex justify-right pt-3 sm:justify-start sm:pt-0">
                <a href="{{ url('/basket') }}">Корзина</a>
            </div>
        @else
            <div class="flex justify-left pt-3 sm:justify-start sm:pt-0">
                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('auth.login') }}"
                                                                     class="underline text-gray-900 dark:text-white">Login</a>
                </div>
                @endauth

            </div>



        @yield('content')



</body>

    <div class="card-footer">
        <a href="{{ url('/') }}">Main</a>
    </div>

</html>

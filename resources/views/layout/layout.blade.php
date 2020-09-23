<html>
<head>
    <title>App Name - @yield('title')</title>
    <style>
        body {
            margin: 3%;
        }

        .btn {
            display: inline-block;
            background: #8C959D;
            color: #fff;
            padding: 0.4rem 3rem;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
@section('content')
    <h1> Welcome to the main page of the framework - laravel </h1>
    <h3> Select the appropriate menu to view articles or create a new article. </h3>
    <h3><a href="view"> View article </a></h3>
    <h3><a href="create"> Create article </a></h3>
@show

<div class="container">
    @yield('bottom')

</div>
</body>
</html>

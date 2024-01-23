<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    @vite(['resources/sass/master.scss'])
    <title>@yield('title', 'Home')</title>
</head>

<body class="bg-light container-master">
    @include('boletos.header')

    <div class="d-flex">
        <div class="container h-100">

            @yield('content')
        </div>
    </div>
    @include('boletos.footer')
</body>
</html>

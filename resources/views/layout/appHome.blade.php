<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/destroy.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
</head>

<body class="imgFundoHome">
    <header>
        @include('layout.header')
    </header>

    <main>
        @yield('content')
    </main>
</body>

<script src="/js/appScript.js"></script>

</html>
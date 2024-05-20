<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aaaaaa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/indexAlcance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createAlcance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editAlcance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/destroyAlcance.css') }}">
    
</head>

<body class="imgFundoAlcance">
    <header>
        @include('layout.header')
    </header>

    <main>
        @yield('content')
    </main>
</body>

<script src="/js/appScript.js"></script>
<script src="/js/modalImageScript.js"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página com Plano de Fundo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/indexAlcance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createAlcance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editAlcance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/destroyAlcance.css') }}">
</head>

<body>
    <header>
        @include('layout.header')
    </header>

    <main>
        @yield('content')
    </main>
</body>

<script>
    var header = document.getElementById('header');
    var navigationHeader = document.getElementById('navegationHeader');
    var content = document.getElementById('content');
    var showSidebar = false;

    function toggleSidebar(){
        showSidebar = !showSidebar;
        /*console.log(showSidebar);*/

        if(showSidebar){
            navigationHeader.style.marginLeft = '-10vw';
            navigationHeader.style.animationName = 'showSidebar';
            content.style.filter = 'blur(2px)';
        }
        else{
            navigationHeader.style.marginLeft = '-100vw';
            navigationHeader.style.animationName = '';
            content.style.filter = '';
        }
    }

    function closeSidebar(){

        if(showSidebar){
            toggleSidebar();
        }
    }

    window.addEventListener('resize', function(event){/*Pegar o tamanho da tela*/
        if(window.innerWidth > 768 && showSidebar){
            toggleSidebar();
        }
    });
</script>
</html>
<header>
    <div class="header" id ="header">
        <button onclick= "toggleSidebar()" class="btnIconHeader">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
        </button>
        <div>
            <img src="{{ asset('img/lol-logo.png') }}" class="imgLogo" alt="LOGO">
        </div>

        <div onclick= "toggleSidebar()" class="navegationHeader" id= "navegationHeader">
            <button class="btnIconHeader">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </button>
            <a href="#" class="active" >Home</a>
            <a href="{{ route ('alcances.index')}}" class="active" >Alcance</a>
            <a href="#" class="active" >Posição</a>
            <a href="#" class="active" >Região</a>
            <a href="#" class="active" >Recursos</a>
            <a href="#" class="active" >Espécies</a>
            <a href="#" class="active" >Habilidade</a>
            <a href="#" class="active" >Skin</a>
            <a href="#" class="active" >Campões</a>

        </div>
    </div>
</header> 
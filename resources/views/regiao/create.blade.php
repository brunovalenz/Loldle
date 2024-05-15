@extends('layout.appRegiao')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Região
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('regiao.store') }}" method="POST">
                @csrf
                @include('regiao.__form')

                <div class="divSalvar">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelar">
                    <a class="btnCancelar" href="{{ route ('regiao.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
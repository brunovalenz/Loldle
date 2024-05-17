@extends('layout.appAlcance')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Posição
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('posicoes.store') }}" method="POST">
                @csrf
                @include('posicoes.__form')

                <div class="divSalvar">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelar">
                    <a class="btnCancelar" href="{{ route ('posicoes.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
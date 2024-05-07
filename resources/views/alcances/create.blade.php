@extends('layout.app')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Alcance
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('alcances.store') }}" method="POST">
                @csrf
                @include('alcances.__form')

                <div class="divSalvarAlcance">
                    <button type="submit" class="btnSalvarAlcance"> Salvar</button>
                </div>
                
                <div class="divCancelarAlcance">
                    <a class="btnCancelarAlcance" href="{{ route ('alcances.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
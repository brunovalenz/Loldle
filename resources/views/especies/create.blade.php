@extends('layout.app')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Espécie
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('especies.store') }}" method="POST">
                @csrf
                @include('especies.__form')

                <div class="divSalvarEspecie">
                    <button type="submit" class="btnSalvarEspecie"> Salvar</button>
                </div>
                
                <div class="divCancelarEspecie">
                    <a class="btnCancelarEspecie" href="{{ route ('especies.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
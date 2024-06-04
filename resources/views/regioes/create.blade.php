@extends('layout.appRegioes')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Região
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('regioes.store') }}" method="POST">
                @csrf
                @include('regioes.__form')

                <div class="divSalvar">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelar">
                    <a class="btnCancelar" href="{{ route ('regioes.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
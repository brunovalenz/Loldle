@extends('layout.appCampeoes')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Campeão
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('campeoes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('campeoes.__form')

                <div class="divSalvar">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelar">
                    <a class="btnCancelar" href="{{ route ('campeoes.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
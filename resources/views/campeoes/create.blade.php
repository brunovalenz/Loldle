@extends('layout.appCampeoes')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCamp">
        <h1 class = "tituloCreate">
            Adicionar - Campeão
        </h1>

        <div class="divPrincipalCamp">
            <form action="{{route('campeoes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('campeoes.__form')
                

                <div class="divSalvarCamp">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelarCamp">
                    <a class="btnCancelar" href="{{ route ('campeoes.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
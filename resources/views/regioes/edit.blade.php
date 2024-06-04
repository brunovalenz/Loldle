@extends('layout.appRegioes')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEdit">
        <h2>Editar - Região</h2>
    </div>

    <div class="divContainerEdit">
        <form action="{{route('regioes.update', $registro->id ) }}" method="POST">
            @csrf
            @method('PUT')
            @include('regioes.__form')

            <div class="divSalvar">
                <button class="btnSalvar" type="submit"> Alterar</button>
            </div>

            <div class="divCancelar">
                <a class="btnCancelar" href="{{ route ('regioes.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
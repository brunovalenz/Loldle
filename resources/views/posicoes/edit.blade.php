@extends('layout.appAlcance')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEdit">
        <h2>Editar - Posição</h2>
    </div>

    <div class="divContainerEdit">
        <form action="{{route('posicoes.update', $registro->id ) }}" method="POST">
            @csrf
            @method('PUT')
            @include('posicoes.__form')

            <div class="divSalvar">
                <button class="btnSalvar" type="submit"> Alterar</button>
            </div>

            <div class="divCancelar">
                <a class="btnCancelar" href="{{ route ('posicoes.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
@extends('layout.appEspecie')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEdit">
        <h2>Editar - Espécie</h2>
    </div>

    <div class="divContainerEdit">
        <form action="{{route('especies.update', $registro->id ) }}" method="POST">
            @csrf
            @method('PUT')
            @include('especies.__form')

            <div class="divSalvar">
                <button class="btnSalvar" type="submit"> Alterar</button>
            </div>

            <div class="divCancelar">
                <a class="btnCancelar" href="{{ route ('especies.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
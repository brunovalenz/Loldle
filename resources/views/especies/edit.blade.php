@extends('layout.app')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEditAlc">
        <h2>Editar - Espécie</h2>
    </div>

    <div class="divContainerEditAlc">
        <form action="{{route('especies.update', $registro->id ) }}" method="POST">
            @csrf
            @method('PUT')
            @include('especies.__form')

            <div class="divSalvarEspecie">
                <button class="btnSalvarEspecie" type="submit"> Alterar</button>
            </div>

            <div class="divCancelarEspecie">
                <a class="btnCancelarEspecie" href="{{ route ('especies.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
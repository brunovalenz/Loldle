@extends('layout.app')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEditAlc">
        <h2>Editar - Alcance</h2>
    </div>

    <div class="divContainerEditAlc">
        <form action="{{route('alcances.update', $registro->id ) }}" method="POST">
            @csrf
            @method('PUT')
            @include('alcances.__form')

            <div class="divSalvarAlcance">
                <button class="btnSalvarAlcance" type="submit"> Alterar</button>
            </div>

            <div class="divCancelarAlcance">
                <a class="btnCancelarAlcance" href="{{ route ('alcances.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
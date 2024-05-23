@extends('layout.appAlcance')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEdit">
        <h2>Editar - Campeão</h2>
    </div>

    <div class="divContainerEdit">
        <form action="{{route('campeoes.update', $registro->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('campeoes.__form')

            <div class="divSalvar">
                <button class="btnSalvar" type="submit"> Alterar</button>
            </div>

            <div class="divCancelar">
                <a class="btnCancelar" href="{{ route ('campeoes.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
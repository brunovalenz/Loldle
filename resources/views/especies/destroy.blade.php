@extends('layout.app')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloDestAlc">
        <h2>Excluir - Espécie</h2>
    </div>

    <div class="divContainerDestAlc">
        <form action="{{route('especies.destroy', $registro->id ) }}" method="POST">
            
            @include('especies.__form')
            @csrf
            @method('DELETE')
                    
        </form>

        <div class="divSalvarAlcance">
            <button type="submit" class="btnExcluirEspecie"> Excluir</button>
        </div>

        <div class="divCancelarEspecie">
            <a class="btnCancelarEspecieDest" href="{{ route ('especies.index')}}">Cancelar</a>
        </div>
        
    </div>
</div>

@endsection
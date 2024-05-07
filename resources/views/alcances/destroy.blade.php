@extends('layout.app')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloDestAlc">
        <h2>Excluir - Alcance</h2>
    </div>

    <div class="divContainerDestAlc">
        <form action="{{route('alcances.destroy', $registro->id ) }}" method="POST">
            
            @include('alcances.__form')
            @csrf
            @method('DELETE')
                    
        </form>

        <div class="divSalvarAlcance">
            <button type="submit" class="btnExcluirAlcance"> Excluir</button>
        </div>

        <div class="divCancelarAlcance">
            <a class="btnCancelarAlcanceDest" href="{{ route ('alcances.index')}}">Cancelar</a>
        </div>
        
    </div>
</div>

@endsection
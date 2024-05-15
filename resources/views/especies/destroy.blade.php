@extends('layout.appEspecie')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloDest">
        <h2>Excluir - Espécie</h2>
    </div>

    <div class="divContainerDest">
        <form action="{{route('especies.destroy', $registro->id ) }}" method="POST">
            
            @include('especies.__form')
            @csrf
            @method('DELETE')
                    
        </form>

        <div class="divSalvar">
            <button type="submit" class="btnExcluir"> Excluir</button>
        </div>

        <div class="divCancelar">
            <a class="btnCancelarDest" href="{{ route ('especies.index')}}">Cancelar</a>
        </div>
        
    </div>
</div>

@endsection
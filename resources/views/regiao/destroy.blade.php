@extends('layout.appRegiao')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloDest">
        <h2>Excluir - Região</h2>
    </div>

    <div class="divContainerDest">
        <form action="{{route('regiao.destroy', $registro->id ) }}" method="POST">
            
            @include('regiao.__form')
            @csrf
            @method('DELETE')
                    
        </form>

        <div class="divSalvar">
            <button type="submit" class="btnExcluir"> Excluir</button>
        </div>

        <div class="divCancelar">
            <a class="btnCancelarDest" href="{{ route ('regiao.index')}}">Cancelar</a>
        </div>
        
    </div>
</div>

@endsection
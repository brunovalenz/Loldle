@extends('layout.appRegiao')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div class="divTituloEdit">
        <h2>Editar - Região</h2>
    </div>

    <div class="divContainerEdit">
        <form action="{{route('regiao.update', $registro->id ) }}" method="POST">
            @csrf
            @method('PUT')
            @include('regiao.__form')

            <div class="divSalvar">
                <button class="btnSalvar" type="submit"> Alterar</button>
            </div>

            <div class="divCancelar">
                <a class="btnCancelar" href="{{ route ('regiao.index')}}">Cancelar</a>
            </div>
            
        </form>
    </div>
</div>

@endsection
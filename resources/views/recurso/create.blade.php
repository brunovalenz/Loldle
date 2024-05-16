@extends('layout.appRecurso')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCreate">
        <h1 class = "tituloCreate">
            Adicionar - Recurso
        </h1>

        <div class="divFilhaCreate">
            <form action="{{route('recurso.store') }}" method="POST">
                @csrf
                @include('recurso.__form')

                <div class="divSalvar">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelar">
                    <a class="btnCancelar" href="{{ route ('recurso.index')}}">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
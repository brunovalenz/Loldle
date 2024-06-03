@extends('layout.appCampeoes')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">
    @include('layout.alert')
    <div  class="divPrincipalCamp">
        <h1 class = "tituloCreate">
            Adicionar - Campeão
        </h1>

        <div class="divPrincipalCamp">
            <form action="{{route('campeoes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('campeoes.__form')
                

                <div class="divSalvarCamp">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelarCamp">
                    <a class="btnCancelar" href="{{ route ('campeoes.index')}}">Cancelar</a>
                </div>

            </form>
            
            <div>
            <form action="{{ route('campeoes_posicoes.store') }}" method="POST">
                <input type="hidden" name="campeoes_idcampeoes" id="campeoes_idcampeoes" value="{{ $proximoId }}">
                <label for="">Testando</label>
                <!-- @foreach($posicoes as $posicao) -->
                    <!-- <div>
                        <input type="checkbox" id="posicoes_idposicoes{{ $posicao->id }}" name="posicoes_idposicoes" value="{{ $posicao->id }}"
                        @if(isset($registro) && in_array($posicao->id, $registro->posicoes)) checked @endif>
                        <label for="posicao{{ $posicao->id }}">{{ $posicao->posicao }}</label>
                    </div> -->

                    <select name="posicoes_idposicoes" id="posicoes_idposicoes">
                    <option>-</option>
                    @foreach($posicoes as $posicao)
                    <option value="{{ $posicao->id }}">{{ $posicao->posicao }}</option>
                    @endforeach
                </select>
                <!-- @endforeach -->
            </form>
            
        </div>


        </div>

    </div>

</div>
@endsection
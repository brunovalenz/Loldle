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
                
                <label for="">Posição</label>

                    @foreach($posicoes as $posicao)
                        <div>
                            <input type="checkbox" id="posicoes{{ $posicao->id }}" name="posicoes[]" value="{{ $posicao->id }}"
                            @if(isset($registro) && in_array($posicao->id, $registro->posicoes)) checked @endif>
                            <label for="posicao{{ $posicao->id }}">{{ $posicao->posicao }}</label>
                        </div>
                    @endforeach

                <label for=""><br>Especie</label>

                    @foreach($especies as $especie)
                        <div>
                            <input type="checkbox" id="especies{{ $especie->id }}" name="especies[]" value="{{ $especie->id }}"
                            @if(isset($registro) && in_array($especie->id, $registro->$especies)) checked @endif>
                            <label for="especie{{ $especie->id }}">{{ $especie->especie }}</label>
                        </div>
                    @endforeach

                <label for=""><br>Regiao</label>

                    @foreach($regioes as $regiao)
                        <div>
                            <input type="checkbox" id="regioes{{ $regiao->id }}" name="regioes[]" value="{{ $regiao->id }}"
                            @if(isset($registro) && in_array($regiao->id, $registro->regioes)) checked @endif>
                            <label for="regiao{{ $regiao->id }}">{{ $regiao->regiao }}</label>
                        </div>
                    @endforeach


                <div class="divSalvarCamp">
                    <button type="submit" class="btnSalvar"> Salvar</button>
                </div>
                
                <div class="divCancelarCamp">
                    <a class="btnCancelar" href="{{ route ('campeoes.index')}}">Cancelar</a>
                </div>

            </form>
            
            <div>
            
        </div>


        </div>

    </div>

</div>
@endsection
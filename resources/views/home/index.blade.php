@extends('layout.appHome')
@section('content')

@if($campeoes)
    <h1>Campeão Aleatório na Página Inicial</h1>
    <p>Nome do campeão: {{ $campeoes->nome }}</p>
    <p>Gênero: {{ $campeoes->genero }}</p>
    <p>Ano: {{ $campeoes->ano }}</p>
    <p>Recurso: {{ $campeoes->recurso->recurso }}</p>
    <p>Alcance: {{ $campeoes->alcance->alcance}}</p>
    <p>Posições:</p>
    <ul>
        @foreach ($campeao->posicoes as $posicao)
            <li>{{ $posicao->posicao }}</li>
        @endforeach
    </ul>


        <!-- 'ano',
        'recursos_idrecursos',
        'alcances_idalcances', -->
    <!-- Adicione mais campos conforme necessário -->
@else
    <p>Nenhum campeão encontrado.</p>
@endif

@endsection
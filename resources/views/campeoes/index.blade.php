@extends('layout.appCampeoes')
@section('content')

<div tabindex="0" onclick="closeSidebar()" class="content" id="content">  
    @include('layout.alert')
    <div class="container">
        <div class="tblConteiner">
            <h2> Cadastro de Campeões</h2>
            
            <form action="{{route('campeoes.index')}}" methood="POST">
                @csrf
                <div class="pesquisar">
                    <label class="campoCustomizado one" for="pesquisar">
                        <input id="pesquisar" name="pesquisar"
                        value ="{{isset($filter['pesquisar']) ? isset($filter['pesquisar']) : ''}}">
                        <span class="placeholder">Pesquisar</span>
                    </label>

                    <button type="submit" class="btnPesquisar">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>

                    <div class="qntLimpar">

                        <label class="lblQuantidade" for="selecionar">Quantidade:</label>
                        <select id="inlineFormSelectPref" name="perPage" class="select">

                            <option value ="5" @if($perPage==5) selected @endif>5</option>
                            <option value ="10" @if($perPage==10) selected @endif>10</option>
                            <option value ="15" @if($perPage==15) selected @endif>15</option>
                            <option value ="20" @if($perPage==20) selected @endif>20</option>

                        </select>

                        

                        <a type="button" class="" href="{{ route ('campeoes.index')}}">
                            Limpar pesquisa
                            <i class=""></i>   
                        </a>
                    </div>
                </div>
            </form>

                <table class ="tbl" id="table">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Gênero</th>
                            <th>Ano</th>
                            <th>Alcance</th>
                            <th colspan="2"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registros as $registro)
                        <tr>
                            <td data-lable="Imagem">
                                <button class="btnImage" onclick="openModal()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                                    </svg> 
                                    <!-- {{ $registro->imagem}} -->
                                </button>
                                @include('campeoes.image')
                            </td>
                            <td data-lable="Nome">{{ $registro->nome}}</td>
                            <td data-lable="Editar">
                                <a class="btnEdit" type="button" href="{{ route('campeoes.edit', $registro->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            </td>
                            <td data-lable="Deletar">
                                <a class="btnExcluirAction" type="button" href="{{ route('campeoes.delete', $registro->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (isset($filter))
                    {!! $registros->appends([
                    'filter'=>$filter,
                    'perPage'=>$perPage
                    ])->links() !!}
                @else
                    {!! $registros->appends(['perPage'=>$perPage])->links() !!}
                @endif
                    
                <a type="button" class ="btnCriarAlcance"
                    href="{{ route('campeoes.create')}}">
                    Adicionar Novo Camp
                    <i class=""></i>
                </a>    
        </div>
    </div>
</div>
@endsection

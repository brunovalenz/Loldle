<div>
    <div class="separacaoCampos">
        <label for="imagem">Escolha uma imagem:</label>
        <input type="file" name="imagem" id="imagem" required>
    </div>
    <div class="separacaoCampos">
        <label class="campoCustomizado one">
            <input required type="text" name="nome" id="nome" value="{{$registro->nome ?? old('nome')}}">
            <span class="placeholder">Nome</span>
            
        </label>
    </div>
    <div class="separacaoCampos">
        <label class="campoCustomizado one">
            <input required type="text" name="genero" id="genero" value="{{$registro->genero ?? old('genero')}}">
            <span class="placeholder">Gênero</span>
            
        </label>
    </div>
    <div class="separacaoCampos">
        <label class="campoCustomizado one">
            <input required type="text" name="ano" id="ano" value="{{$registro->ano ?? old('ano')}}">
            <span class="placeholder">Ano</span>
            
        </label>
    </div>

    <div>

        <label>Recurso</label>
        <select name="recursos_idrecursos" id="recursos_idrecursos">
            <option>-</option>
            @foreach($recursos as $recurso)
                <option value="{{ $recurso->id }}" @if(isset($registro) && $recurso->id == $registro->recursos_idrecursos) selected @endif>{{ $recurso->recurso }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label >Alcance</label>
        <select name="alcances_idalcances" id="alcances_idalcances">
            <option>-</option>
            @foreach($alcances as $alcance)
            <option value="{{ $alcance->id }}" @if(isset($registro) && $alcance->id == $registro->alcances_idalcances) selected @endif>{{ $alcance->alcance }}</option>
            @endforeach
        </select>
    </div>
</div>
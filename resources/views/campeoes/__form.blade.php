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
    <div class="separacaoCampos">
        <label class="campoCustomizado one">
            <input required type="text" name="recursos_idrecursos" id="recursos_idrecursos" value="{{$registro->recursos_idrecursos ?? old('recursos_idrecursos')}}">
            <span class="placeholder">ID Recursos</span>
            
        </label>
    </div>
    <div class="separacaoCampos">
        <label class="campoCustomizado one">
            <input required type="text" name="alcances_idalcances" id="alcances_idalcances" value="{{$registro->alcances_idalcances ?? old('alcances_idalcances')}}">
            <span class="placeholder">ID Alcance</span>
            
        </label>
    </div> 
</div>
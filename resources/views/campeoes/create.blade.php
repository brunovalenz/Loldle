<!DOCTYPE html>
<html>
<head>
    <title>Criar Campeão</title>
</head>
<body>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campeoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
        <br><br>
        <label for="imagem">Escolha uma imagem:</label>
        <input type="file" name="imagem" id="imagem" required>
        <br><br>
        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" value="{{ old('genero') }}" required>
        <br><br>
        <label for="ano">Ano:</label>
        <input type="text" name="ano" id="ano" value="{{ old('ano') }}" required>
        <br><br>
        <label for="recursos_idrecursos">ID de Recursos:</label>
        <input type="text" name="recursos_idrecursos" id="recursos_idrecursos" value="{{ old('recursos_idrecursos') }}" required>
        <br><br>
        <label for="alcances_idalcances">ID de Alcances:</label>
        <input type="text" name="alcances_idalcances" id="alcances_idalcances" value="{{ old('alcances_idalcances') }}" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

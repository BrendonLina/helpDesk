<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>
    <h3>Usuarios</h3>
    @foreach($usuarios as $usuario)
        <form method="GET" action="/editar-nivel-usuario/{{ $usuario->id }}">
            @csrf
            @method('PUT')
            <p>{{$usuario->name}} - Nivel de acesso: <b>{{$usuario->permissao->nome}}</b></p>
            <button class="btn btn-primary" id="btn-primary" type="submit" name="editar">Editar</button>
            
        </form>
        {{-- <form method="POST" action="/deletarveiculo/{{ $veiculo->id }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary" id="btn-primary" type="submit" name="deletar">Deletar</button>
        </form> --}}

    @endforeach

</body>
</html>
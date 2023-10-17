<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chamados em aberto</title>
</head>
<body>
    <h3>chamados</h3>

    @foreach ($chamados as $chamado )
        <p>{{$chamado->user->name}}</p>
        <p>{{$chamado->titulo}}</p>
        <p>{{$chamado->descricao}}</p>
    @endforeach
</body>
</html>
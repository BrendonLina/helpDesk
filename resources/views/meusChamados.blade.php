<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meus chamados</title>
</head>
<body>
     <h3>chamados de user:</h3>

     @foreach($chamadoUser as $chamado)
        <p>{{$chamado->titulo}}</p>
        <p>{{$chamado->descricao}}</p>
        <p>{{$chamado->imagem}}</p>
     @endforeach
</body>
</html>
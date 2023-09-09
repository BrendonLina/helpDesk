<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>{{session()->get('usuario.usuario.email')}}</p>
    <a href="{{route('add.permissao')}}">Adicionar Permissão</a>
    <a href="{{route('logout')}}">Sair</a>
</body>
</html>
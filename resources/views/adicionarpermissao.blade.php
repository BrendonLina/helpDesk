<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar permissão</title>
</head>
<body>
    <form action="{{route('add.permissao')}}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="nome da permissao">
        <input type="number" name="permissao" placeholder="permissao de 0 a 3">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
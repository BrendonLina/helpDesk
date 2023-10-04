<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar permissão</title>
</head>
<body>
    <form action="/adicionar-permissao" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="nome da permissao">
        <input type="number" name="permissao" placeholder="permissao de da permissão">
        <select>
            <option selected disabled=""> Permissões cadastradas</option>
            @foreach($permissoes as $permissao)
                <option value="{{$permissao->nome}}" disabled="">{{$permissao->permissao}} - {{$permissao->nome}}</option>
            @endforeach
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
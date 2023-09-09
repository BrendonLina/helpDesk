<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add adm geral</title>
</head>
<body>
    <form action="{{route('add.adm.geral')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Seu nome">
        <input type="email" name="email" placeholder="Seu email">
        <input type="password" name="password" placeholder="Sua senha">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar usuario</title>
</head>
<body>
    <form action="/adicionarusuario" method="POST">
        @csrf
        <input type="text" placeholder="Nome" name="name">
        <input type="email" placeholder="Email" name="email">
        <input type="submit" value="cadastrar">
    </form>
</body>
</html>
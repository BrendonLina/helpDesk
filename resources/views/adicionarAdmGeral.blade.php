<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/adicionaradmgeral" method="post">
        @csrf
        
        <input type="text" name="name" placeholder="Nome adm geral">
        <input type="email" name="email" placeholder="Email adm geral">
        <input type="password" name="password" placeholder="Senha">
        <input type="submit" value="cadastrar">
    </form>
</body>
</html>
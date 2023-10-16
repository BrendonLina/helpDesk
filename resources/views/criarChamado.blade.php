<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar chamado</title>
</head>
<body>
    <form action="/criarchamado" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Descreva seu problema</h3>

        <input type="text" name="titulo" placeholder="titulo">
        <input type="file" name="imagem">
        <textarea name="descricao" placeholder="Descrição"></textarea>
        <input type="submit">
    </form>
</body>
</html>
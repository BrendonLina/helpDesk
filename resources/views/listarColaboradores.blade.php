<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Listando colaboradores/usuarios da empresa</h3>
   
    @foreach ($userEmpresa as $empresa )
        <p><b>Nome:</b> {{$empresa->name}} - {{$empresa->permissao->nome}}</p>    
    @endforeach

</body>
</html>
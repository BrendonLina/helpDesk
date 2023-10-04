<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Nivel Usuario</title>
</head>
<body>
    <h3>Alterar nivel do usuario: {{$usuario->name}}</h3>
    <form action="#" method="post">
        @csrf
        @method('PUT')
        {{-- <select name="permissao">
             @foreach($usuarios as $usuario) 
                <option value="{{$usuario->permissao_id}}">{{$usuario->permissao->nome}}</option>                      
             @endforeach 
        </select> --}}
        <select name="permissao">
            @foreach($permissoes as $permissao) 
               <option value="{{$permissao->permissao}}">{{$permissao->nome}}</option>                      
            @endforeach 
       </select>

        <input type="submit" value="Alterar">
    </form>
</body>
</html>
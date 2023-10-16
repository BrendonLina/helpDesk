<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    {{-- lembrar de trocar o if por switch case --}}
    <h1>Dashboard</h1>
    <p>{{Auth::user()->name}}</p>
    <p>{{Auth::user()->permissao->nome}}</p>

    {{-- @if(Auth::user()->permissao->id == 1)
    <a href="/adicionar-permissao">Adicionar Permissões</a>
    <a href="/listar-usuarios">Editar nivel de usuário</a>
    @endif
    @if(Auth::user()->permissao->id == 2)
        <a href="/adicionarcolaborador">Adicionar colaboradores</a>
        <a href="/adicionarusuario">Adicionar usuarios</a>
        <a href="/colaboradores">Usuarios/Colaboradores da empresa</a>
    @endif --}}

    @switch(Auth::user())
        @case(Auth::user()->permissao->id == 1)
            <a href="/adicionar-permissao">Adicionar Permissões</a>
            <a href="/listar-usuarios">Editar nivel de usuário</a>
        @break
        @case(Auth::user()->permissao->id == 2)
            <a href="/adicionarcolaborador">Adicionar colaboradores</a>
            <a href="/adicionarusuario">Adicionar usuarios</a>
            <a href="/colaboradores">Usuarios/Colaboradores da empresa</a>
        @break
        @case(Auth::user()->permissao->id == 3)
            <a href="#">Meus chamados</a>
            <a href="/chamados">Chamados em aberto</a>
           
        @break
        @case(Auth::user()->permissao->id == 4)
            <a href="/criarchamado">Criar chamado</a>
            <a href="/chamadosusuario">Meus chamados</a>
            
        @break
            
    @endswitch
    <a href="/logout">sair</a>
</body>
</html>
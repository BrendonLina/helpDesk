<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Permissao;
use App\Models\Chamado;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $usuario = User::find($id);

        $usuario->permissao_id = $request->permissao;
    
        $usuario->update();

        return "Dados alterados com sucesso!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$usuario = User::find($id)){
            return redirect()->route('listar.nivel.usuario');
        }

        $usuarios = User::all();
        // $permissoes = Permissao::all();
        $permissoes = Permissao::where('nome', '<>', 'adm geral')->get();

        return view('editarnivelusuario', compact('usuario','usuarios','permissoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listarNivelUsuario()
    {
        //usar assim ou criar um middleware
        if(Auth::user()->permissao_id != 1)
        {
            return redirect('dashboard');
        }
        $usuarios = User::where('permissao_id', '<>', 1)->get();

        return view('listarusuarios', compact('usuarios'));
    }


    public function adicionarColaborador()
    {
        return view ('adicionarColaborador');
    }

    public function adicionarColaboradorStore(Request $request)
    {
        
        $userColaborador = new User;

        $userColaborador->name = $request->name;
        $userColaborador->password = bcrypt(123456);
        $userColaborador->email = $request->email;
        $userColaborador->permissao_id = 3;
        $userColaborador->nome_empresa = Auth::user()->nome_empresa;

        $userColaborador->save();

        return redirect()->route('adicionar.colaborador')->with('success', 'Colaborador cadastrado com sucesso');
    }

    
    public function adicionarPermissao()
    {
        $permissoes = Permissao::all();
        return view('adicionarpermissao', compact('permissoes'));
    }

    public function adicionarPermissaoStore(Request $request)
    {
        $permissao = new Permissao;

        $permissao->nome = $request->nome;
        $permissao->permissao = $request->permissao;
        
        $permissao->save();

        // return redirect()->route('adicionar.permissao')->with('success', 'Permissão cadastrada com sucesso');

        return "Dados cadastrados com sucesso";
    }

    public function dashboard(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'Senha obrigatória.'
        ]);


        if(Auth::attempt($credenciais)){

            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        }
        if(!Auth::check()){

            return redirect()->back()->with('danger','Email ou Senha incorreto');
        }
    }

    public function cadastrar()
    {
        return view('cadastrar');
    }

    public function cadastrarStore(Request $request)
    {
        $usuario = new User;

        $usuario->nome_empresa = $request->nome_empresa;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->permissao_id = 2;

        $usuario->save();

        return redirect('login');
    }

    public function listarColaboradores()
    {
    
        $empresa = Auth::user()->nome_empresa;
        $userEmpresa = User::where('nome_empresa','=',$empresa)
        ->where('permissao_id','<>', 2)
        ->with('permissao')
        ->get();

        return view('listarColaboradores', compact('userEmpresa','empresa'));
    }

    public function adicionarUsuario()
    {
        return view('adicionarUsuario');
    }

    public function adicionarUsuarioStore(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->password = bcrypt(123456);
        $user->email = $request->email;
        $user->permissao_id = 4;
        $user->nome_empresa = Auth::user()->nome_empresa;

        $user->save();

        return redirect()->route('adicionar.usuario')->with('success', 'Colaborador cadastrado com sucesso');
    }

    public function adicionarAdmGeral()
    {
        return view('adicionarAdmGeral');
    }

    public function adicionarAdmGeralStore(Request $request)
    {
        $userAdmGeral = new User;

        $userAdmGeral->name = $request->name;
        $userAdmGeral->email = $request->email;
        $userAdmGeral->password = bcrypt($request->password);
        $userAdmGeral->permissao_id = 1;
        $userAdmGeral->nome_empresa = null;

        $userAdmGeral->save();

        return redirect()->route('dashboard')->with('success', 'Colaborador cadastrado com sucesso');
    }

    public function chamados()
    {
        return view('chamados');
    }

    public function criarChamado()
    {
        return view('criarchamado');
    }

    public function criarChamadoStore(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:20|min:3',
            'descricao' => 'required|max:255|min:3',
            'imagem' => 'image',
        ],[
            'titulo.required' => 'Titulo é obrigatório.',
            'titulo.max' => 'Limite de 20 caracteres excedito.',
            'titulo.min' => 'Limite minimo de 3 caracteres.',
            'descricao.required' => 'descrição é obrigatorio.',
            'descricao.max' => 'Limite de 255 caracteres excedito.',
            'descricao.min' => 'Limite minimo de 3 caracteres.',
            'imagem.image' => 'o arquivo precisa ser uma imagem.',
            
        ]);

        $userChamado = new Chamado;

        $userChamado->titulo = $request->titulo;

        $userChamado->user_id = Auth::user()->id;

        if($request->imagem->isValid())
        {
            $request->imagem->store('chamados');
        };

        $userChamado->descricao = $request->descricao;

        $userChamado->save();

        return redirect()->route('dashboard')->with('success', 'Colaborador cadastrado com sucesso');


    }

    public function chamadosUsuario()
    {
        $chamadoUser = Auth::user()->chamados;

        // dd($chamadoUser);
        return view('meuschamados',compact('chamadoUser'));
    }
   
}

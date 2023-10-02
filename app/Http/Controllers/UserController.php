<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Permissao;

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

        return view('editarnivelusuario', compact('usuario','usuarios'));
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
        $usuarios = User::all();

        return view('listarusuarios', compact('usuarios'));
    }

    // public function adicionarAdm()
    // {
    //     return view('adicionarAdm');
    // }

    // public function adicionarAdmStore(Request $request)

    // {
    //     $userAdm = new User;

    //     $userAdm->name = $request->name;
    //     $userAdm->password = $request->password;
    //     $userAdm->email = $request->email;
    //     $userAdm->permissao_id = 2;

    //     $userAdm->save();

    //     return redirect()->route('add.adm')->with('success', 'ADM cadastrado com sucesso');
    // }

    // public function adicionarColaborador()
    // {
    //     return view ('adicionarColaborador');
    // }

    // public function adicionarColaboradorStore(Request $request)
    // {
    //     $userColaborador = new User;

    //     $userColaborador->name = $request->name;
    //     $userColaborador->password = $request->password;
    //     $userColaborador->email = $request->email;
    //     $userColaborador->permissao_id = 1;

    //     $userColaborador->save();

    //     return redirect()->route('add.colaborador')->with('success', 'Colaborador cadastrado com sucesso');
    // }

    // public function adicionarUsuario()
    // {
    //     return view ('adicionarUsuario');
    // }

    // public function adicionarUsuarioStore(Request $request)
    // {
    //     $user = new User;

    //     $user->name = $request->name;
    //     $user->password = $request->password;
    //     $user->email = $request->email;
    //     $user->permissao_id = 0;

    //     $user->save();

    //     return redirect()->route('add.colaborador')->with('success', 'Usuario cadastrado com sucesso');
    // }

    // public function adicionarPermissao()
    // {
    //     return view('adicionarpermissao');
    // }

    // public function adicionarPermissaoStore(Request $request)
    // {
    //     $permissao = new Permissao;

    //     $permissao->nome = $request->nome;
    //     $permissao->permissao = $request->permissao;
        
    //     $permissao->save();

    //     return redirect()->route('add.permissao')->with('success', 'Permissão cadastrada com sucesso');
    // }

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

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    
    public function index()
    {
        $sessao = $this->checkSession();

        if($sessao == "" ?? null ?? 0){
            return redirect('/');
        }
      
        if($this->checkSession())
        {          
            return view('dashboard');
        }
    }


    public function login(Request $request)
    {
        if($this->checkSession())
        {          
            return view('dashboard');
        }

        return view('login');
    }

    public function dashboard(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $usuario = trim($request->input('email'));
        $password = trim($request->input('password'));
        
        $usuario = User::where('email', $usuario)->first();
        
        if(!$usuario)
        {
            return redirect()->back()->with('danger', 'Email ou senha inválida!');
        }

       if(Hash::check($password, $usuario->password))
       {
            $request->session()->put("usuario",[
                'usuario' => $usuario,  
            ]);

            return view('dashboard', compact('usuario'));
       }

       else
       {
           return redirect()->back()->with('danger', 'Email ou senha inválida!');
       }

    }

   
    private function checkSession()
    {
        return session()->has('usuario');
    }

    public function logout(Request $request)
    {
        session()->forget('usuario');

        return view('login');
    }
}

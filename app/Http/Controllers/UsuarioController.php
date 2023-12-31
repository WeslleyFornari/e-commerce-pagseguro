<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function login(Request $request){

        return view('login');
    }

// VALIDAÇÃO DE LOGIN
    public function logar(Request $request){

        $cpf = $request->input("cpf");
        $senha = $request->input("password");

        $login = Usuario::where('cpf', $cpf)->first();

        if ($login && Hash::check($senha, $login->password)) {
            
           Auth::login($login);
       
           session(['nomeUsuario' => $login->nome]);

           return redirect()->route("home");

        } else {
            return redirect()->route("login")->with('error', 'Usuário ou senha inválidos');
        }
    }

    public function logout(Request $request){

            Auth::logout();
          
        return redirect()->route('home');
    }
}

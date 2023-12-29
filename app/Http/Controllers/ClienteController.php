<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){

        $data = [];
        return view("cadastrar", $data);
    }

    public function cadastrar_cliente(Request $request){

        $data = $request->all();
        
        $usuario = new Usuario($data);
        $endereco = new Endereco($data);

        $usuario->save();
        $endereco->usuario_id = $usuario->id;
        $endereco->save();
        
       
        return redirect()->route('cadastrar');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $usuario->password = Hash::make($data['password']);

// TRY CATCH DE TRANSAÇÕES
        try {
            \DB::beginTransaction(); // Inicia

            $usuario->save();
            $endereco->usuario_id = $usuario->id;
            $endereco->save();

            \DB::commit(); // Confirmação

        } catch (\Exception $e) {
            \DB::rollback(); // Volta
        }
        
        return redirect()->route('cadastrar')->with('success', 'Cliente cadastrado com sucesso!');
    }

}

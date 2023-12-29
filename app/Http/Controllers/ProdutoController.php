<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){

       $data = [];
       $produtos = Produto::all();
       $data["lista"] = $produtos;

       return view("home", compact('produtos'));

    }

    public function categoria(Request $request, $id){

        $data = [];
        $categorias = Categoria::all();
        $produtos = Produto::where('categoria_id', $id)->get();

        return view("categoria", compact('produtos', 'categorias'));
    }

    public function todasCategorias(Request $request){

        $data = [];
        $categorias = Categoria::all();
        $produtos = Produto::all();

        return view("categoria", compact('produtos', 'categorias'));
    }

// CARRINHO DE COMPRAS --------------------------------------------------------------------------------
    public function adicionar_car (Request $request, $id){

        $prod = Produto::find($id);

// SESSION CART
        $carrinho = session('cart', []);
        array_push($carrinho, $prod);
        session(['cart' => $carrinho]);

        return redirect()->route('home');
    }

    public function carrinho(Request $request){

// SESSION CART
        $carrinho = session('cart',[]);
        $data = ['cart' => $carrinho];

        return view('carrinho', $data);
    }

// DELETAR ITEM CART
    public function deletar_item(Request $request, $indice){

        $carrinho = session('cart',[]);
        unset($carrinho[$indice]);

        session(['cart' => $carrinho]);
        
        return redirect()->route('carrinho');

    }
// --------------------------------------------------------------------------------------------------    
}

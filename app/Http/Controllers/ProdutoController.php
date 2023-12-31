<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Produto;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

// VER
    public function carrinho(Request $request){

        // SESSION CART
        $carrinho = session('cart',[]);
        $data = ['cart' => $carrinho];

        return view('carrinho', $data);
    }

// FINALIZAR CARRINHO
    public function finalizar_car(Request $request, $prods = []){

        $usuarioId = session('usuarioId');
        $prods = session('cart',[]);
        
        // Try Transaction
        try{
            \DB::beginTransaction();

            $dataAtual = new DateTime();

            // Instanciar PEDIDO
            $pedido = new Pedido();
            $pedido->data_pedido = $dataAtual->format("Y-m-d H:i:s");
            $pedido->status = "pendente";
            $pedido->usuario_id = $usuarioId;

            $pedido->save();

            // Instanciar ITENS
            foreach($prods as $p){

            $itens = new ItensPedido();
            $itens->quantidade = 1;
            $itens->valor = $p->valor;
            $itens->data_item = $dataAtual->format("Y-m-d H:i:s");
            $itens->produto_id = $p->id;
            $itens->pedido_id = $pedido->id;

            $itens->save();
            }
            \DB::commit();
            $request->session()->forget("cart"); // Reseta os iterns do carrinho
            return redirect()->route('carrinho')->with('success', 'Compra finalizada com sucesso!');
            

        }catch(\Exception $e){
           \DB::rollback();

            // Log::error("ERRO VENDA:", ['message' => $e->getmessage()]);
            return redirect()->route("carrinho")->with('error', 'Ocorreu um erro ao finalizar a compra, tente novamente.');
        }
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

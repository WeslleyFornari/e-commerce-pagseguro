<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

   // Mocando dados na tabela categoria e produtos     
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

    // MOCAR 6 PRODUTOS
        $prod = new \App\Models\Produto(['nome' => 'Tênis 1', 'valor' => 199, 'foto' => 'images/tenis01.png', 'descricao' => 'Tênis Adidas cor branca', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Tênis 2', 'valor' => 219, 'foto' => 'images/tenis02.png', 'descricao' => 'Tênis Adidas cor preta', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Bola', 'valor' => 129, 'foto' => 'images/bola03.png', 'descricao' => 'Bola de futebol Penalti campo', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Camiseta', 'valor' => 99, 'foto' => 'images/camiseta04.png', 'descricao' => 'Camiseta Nike azul malha fina', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Boneco 1', 'valor' => 309, 'foto' => 'images/hulk05.png', 'descricao' => 'Miniatura HULK', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Boneco 2', 'valor' => 349, 'foto' => 'images/wolverine06.png', 'descricao' => 'Miniatura Wolverine', 'categoria_id' => $cat->id]);
        $prod->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

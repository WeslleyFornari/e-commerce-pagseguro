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
        Schema::create('itens_pedidos', function (Blueprint $table) {
            $table->increments("id");

            $table->integer("quantidade");
            $table->decimal("valor", 10,2);
            $table->datetime("data_item");

        // Chave Estrangeira 1   
            $table->integer("produto_id")->unsigned();
            $table->foreign("produto_id")->references("id")->on("produtos")->onDelete("cascade");

        // Chave Estrangeira 2
            $table->integer("pedido_id")->unsigned();
            $table->foreign("pedido_id")->references("id")->on("pedidos")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_pedidos');
    }
};

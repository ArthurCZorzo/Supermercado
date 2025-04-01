<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaoEstoqueTable extends Migration
{
    public function up()
    {
        Schema::create('movimentacao_estoque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->date('data_entrada')->nullable();
            $table->date('data_saida')->nullable();
            $table->integer('quantidade_entrada')->default(0);
            $table->integer('quantidade_saida')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimentacao_estoque');
    }
}

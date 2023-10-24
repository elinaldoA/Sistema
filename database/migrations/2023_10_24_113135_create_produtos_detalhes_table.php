<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_detalhes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('destaque')->default(false)->nullable();
            $table->longtext('composicao')->nullable();
            $table->longtext('indicado')->nullable();
            $table->longtext('funcionamento')->nullable();
            $table->longtext('contraindicacoes')->nullable();
            $table->longtext('como_usar')->nullable();
            $table->double('altura')->nullable();
            $table->double('largura')->nullable();
            $table->double('comprimento')->nullable();
            $table->double('peso')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_detalhes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->text('nome');
            $table->longtext('descricao');
            $table->longtext('composicao')->nullable();
            $table->longtext('indicado')->nullable();
            $table->longtext('funcionamento')->nullable();
            $table->longtext('contraindicacoes')->nullable();
            $table->longtext('como_usar')->nullable();
            $table->double('preco');
            $table->double('desconto')->nullable();
            $table->double('preco_com_desconto')->nullable();
            $table->integer('qt');
            $table->double('altura')->nullable();
            $table->double('largura')->nullable();
            $table->double('comprimento')->nullable();
            $table->double('peso')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->boolean('active')->default(false);
            $table->boolean('destaque')->default(false)->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('produtos');
    }
}

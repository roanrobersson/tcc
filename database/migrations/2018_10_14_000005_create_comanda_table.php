<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComandaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('usuario_id');
          $table->string('nomeCliente', 45);
          $table->boolean('paga')->nullable();
          $table->decimal('desconto', 10, 2)->nullable();

          $table->foreign('usuario_id')->references('id')->on('usuario');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda');
    }
}

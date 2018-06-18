<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
          $table->increments('id');

          $table->enum('tipo_usuario',['AMBOS','CONTRATANTE','BENEFICIARIO']);
          $table->enum('tipo_persona',['NATURAL','JURIDICA']);
          $table->string('documento_persona',11)->nullable();
          $table->string('nombres_persona',64);
          $table->string('apellidos_persona',64);
          $table->softDeletes();
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
        Schema::dropIfExists('personas');
    }
}

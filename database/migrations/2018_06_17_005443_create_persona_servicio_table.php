<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_servicio', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('persona_id')->unsigned();
          $table->foreign('persona_id')->references('id')->on('personas');

          $table->integer('servicio_id')->unsigned();
          $table->foreign('servicio_id')->references('id')->on('servicios');


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
        Schema::dropIfExists('persona_servicio');
    }
}

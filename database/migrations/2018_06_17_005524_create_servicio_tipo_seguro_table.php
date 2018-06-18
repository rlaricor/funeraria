<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTipoSeguroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_tipo_seguro', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('servicio_id')->unsigned();
          $table->foreign('servicio_id')->references('id')->on('servicios');

          $table->integer('tipo_seguro_id')->unsigned();
          $table->foreign('tipo_seguro_id')->references('id')->on('tipo_seguros');

          $table->string('obs_tipo_seguro',64)->nullable();

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
        Schema::dropIfExists('servicio_tipo_seguro');
    }
}

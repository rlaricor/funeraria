<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('servicio_id')->unsigned();
          $table->foreign('servicio_id')->references('id')->on('servicios');

          $table->double('pago',8 ,2);
          $table->date('fecha_pago');
          $table->string('observacion_pago',64)->nullable();

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('pagos');
    }
}

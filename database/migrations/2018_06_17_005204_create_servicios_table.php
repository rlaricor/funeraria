<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
          $table->increments('id');
          $table->enum('tipo',['SERVICIO','PROFORMA'])->default('SERVICIO');
          $table->string('n_contrato',10);
          $table->date('fecha_contrato')->nullable();

          $table->integer('contratista_id')->unsigned()->nullable();
          $table->foreign('contratista_id')->references('id')->on('contratistas');

          $table->integer('tipo_seguro_id')->unsigned()->nullable();
          $table->foreign('tipo_seguro_id')->references('id')->on('tipo_seguros');

          $table->date('fecha_defuncion')->nullable();
          $table->string('dni_difunto',8)->nullable();
          $table->string('nombres_difunto',64)->nullable();
          $table->string('apellidos_difunto',128)->nullable();

          $table->integer('lugar_inscripcion_id')->unsigned()->nullable();
          $table->foreign('lugar_inscripcion_id')->references('id')->on('lugar_inscripcions');

          $table->string('obs_lugar_inscripcion',64)->nullable()->nullable();

          $table->float('total_servicio', 8, 2)->nullable();
          $table->float('pagado_servicio', 8, 2)->nullable();
          $table->string('cobro_seguro',64)->nullable();

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
        Schema::dropIfExists('servicios');
    }
}

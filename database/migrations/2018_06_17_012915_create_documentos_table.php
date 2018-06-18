<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('servicio_id')->unsigned();
          $table->foreign('servicio_id')->references('id')->on('servicios');
          $table->integer('tipo_documento_id')->unsigned();
          $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');

          $table->string('url_documento',128);

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
        Schema::dropIfExists('documentos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celulars', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('persona_id')->unsigned();
          $table->foreign('persona_id')->references('id')->on('personas');

          $table->string('celular',9);

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
        Schema::dropIfExists('celulars');
    }
}

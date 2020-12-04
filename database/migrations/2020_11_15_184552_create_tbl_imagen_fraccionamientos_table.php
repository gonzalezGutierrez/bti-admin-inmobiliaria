<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblImagenFraccionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_imagen_fraccionamientos', function (Blueprint $table) {
            $table->increments('idImagenFraccionamiento');
            $table->string('url_imagen');
            $table->integer('idFraccionamiento')->unsigned();
            $table->foreign('idFraccionamiento')->references('idFraccionamiento')->on('cat_fraccionamientos');
            $table->tinyInteger('eliminado')->default(0);
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
        Schema::dropIfExists('tbl_imagen_fraccionamientos');
    }
}

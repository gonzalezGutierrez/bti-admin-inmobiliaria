<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCoordenadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_coordenadas', function (Blueprint $table) {
            $table->increments('idCoordenada');
            $table->double('latitud');
            $table->double('longitud');
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
        Schema::dropIfExists('tbl_coordenadas');
    }
}

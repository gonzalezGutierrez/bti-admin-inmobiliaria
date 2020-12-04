<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lotes', function (Blueprint $table) {

            $table->increments('idLote');
            $table->string('numeroLote');
            $table->string('manzana');
            $table->longText('descripcion');
            $table->string('color');
            $table->tinyInteger('eliminado')->default(0);

            $table->integer('idFraccionamiento')->unsigned();
            $table->foreign('idFraccionamiento')->references('idFraccionamiento')->on('cat_fraccionamientos');

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
        Schema::dropIfExists('tbl_lotes');
    }
}

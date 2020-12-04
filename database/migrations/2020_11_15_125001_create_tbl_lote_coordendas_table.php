<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLoteCoordendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lote_coordendas', function (Blueprint $table) {

            $table->increments('idLoteCoordenada');
            $table->integer('idLote')->unsigned();
            $table->foreign('idLote')->references('idLote')->on('tbl_lotes');
            $table->double('latitud');
            $table->double('longitud');

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
        Schema::dropIfExists('tbl_lote_coordendas');
    }
}

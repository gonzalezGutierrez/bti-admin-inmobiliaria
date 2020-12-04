<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraccionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_fraccionamientos', function (Blueprint $table) {
            $table->increments('idFraccionamiento');
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('idEmpresa')->on('cat_empresas');
            $table->string('fraccionamiento');
            $table->string('url_img_lotes_fraccionado');
            $table->integer('idMunicipio')->unsigned();
            $table->longText('direccion')->nullable();
            $table->longText('descripcion')->nullable();
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
        Schema::dropIfExists('cat_fraccionamientos');
    }
}

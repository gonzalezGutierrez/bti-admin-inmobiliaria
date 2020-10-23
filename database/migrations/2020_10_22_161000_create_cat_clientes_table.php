<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_clientes', function (Blueprint $table) {
            $table->increments('idCliente');

            $table->string('nombre',40);
            $table->string('apellidoPaterno',40);
            $table->string('apellidoMaterno',40);
            $table->string('codigo')->nullable();
            $table->string('celular',14);
            $table->string('email',100)->unique();

            $table->integer('idIdentificacion')->unsigned();
            $table->foreign('idIdentificacion')->references('idIdentificacion')->on('cat_identificaciones');

            $table->string('curp',18);
            $table->enum('tipoCliente',['prospecto','cliente activo','cliente inactivo']);

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
        Schema::dropIfExists('tbl_clientes');
    }
}

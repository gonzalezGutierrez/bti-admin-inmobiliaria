<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatIdentificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_identificaciones', function (Blueprint $table) {
            $table->increments('idIdentificacion');
            $table->string('identificacion',100);
            $table->integer('codigo')->nullable();
            $table->longText('descripcion')->nullable();
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
        Schema::dropIfExists('cat_identificaciones');
    }
}

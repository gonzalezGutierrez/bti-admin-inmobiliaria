<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {

            $table->increments('idUsuario');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('celular',10);
            $table->string('nombreUsuario',10);
            $table->string('email',50)->unique();
            $table->string('password');
            $table->tinyInteger('eliminado')->default(0);

            $table->integer('idRol')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();

        $user->nombre   = 'Jesús Alberto';
        $user->apellido = 'Gonzalez';
        $user->celular  = '9614480256';
        $user->nombreUsuario = '@jesusgonzalez';
        $user->email         = 'jesus.gutierrez971225@gmail.com';
        $user->password      = '12345678';
        $user->idRol         = 1;
        $user->save();
    }
}

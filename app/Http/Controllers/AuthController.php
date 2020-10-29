<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function form() {
        return view('auth.login');
    }

    public function login (Request $request) {

        $nombreUsuario = $request->nombreUsuario;
        $password      = $request->password;

        $usuario       = User::findByUserName($nombreUsuario);

        $mensaje = 'Las credenciales proporcionadas son incorrectas';

        if ($usuario ) {

            if (Hash::check($password, $usuario->password)) {

                if ($usuario->eliminado == 0) {
                    Auth::loginUsingId($usuario->idUsuario);
                    return redirect('/clientes');
                }

                $mensaje = 'Tu cuenta actualmente esta inactiva';

            }

            $mensaje = 'Las credenciales proporcionadas son incorrectas';

        }

        return back()->withErrors(['nombreUsuario'=>trans('auth.failed')])
            ->with('nombreUsuario',request('nombreUsuario'));

    }

    public function logout () {
        Auth::logout();
        return redirect('/auth/login');
    }

}

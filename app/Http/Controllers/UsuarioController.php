<?php

namespace App\Http\Controllers;

use App\Models\CatRol;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioStoreRequest;

use App\Models\User;

class UsuarioController extends Controller
{


    public function index()
    {
        $usuarios = User::getUsers()->paginate();
        return view('administracion.usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        $user = new User();
        $roles = CatRol::getRolesSelect();
        return view('administracion.usuarios.create',compact('user','roles'));
    }

    public function edit($idUsuario)
    {
        $user = User::findOrFail($idUsuario);
        return view('usuarios.edit',compact('user'));
    }

    public function store(UsuarioStoreRequest $request)
    {
        try{

            $user = new User();

            $user->email         = $request->email;
            $user->password      = $request->password;
            $user->nombre        = $request->nombre;
            $user->apellido      = $request->apellido;
            $user->nombreUsuario = 'usuario-d';
            $user->celular       = $request->celular;
            $user->idRol         = $request->idRol;
            $user->save();

            return redirect('usuarios')
                ->with('success','El usuario fue registrado correctamente');

        }catch(\Exception $exception){

            return back()
                ->with('warning','Un error ocurrio al registrar el usuario');

        }
    }

    public function update(Request $request,$idUsuario)
    {
        try {

            $user = User::findOrFail($idUsuario);

            $user->email         = $request->email;
            $user->password      = $request->password;
            $user->nombre        = $request->nombre;
            $user->apellido      = $request->apellido;
            $user->nombreUsuario = $request->nombre;
            $user->celular       = $request->celular;
            $user->save();

            return redirect('usuarios')
                ->with('success','El usuario fue actualizado correctamente');

        } catch (\Exception $exception) {

            return back()
                ->with('warning','Un error ocurrio al actualizar la información del usuario')
                ->withInputs();

        }

    }

    public function destroy($idUsuario)
    {

        try {

            $user = User::findOrFail($idUsuario);
            $user->patchItem('eliminado',1);

            return redirect('usuarios')
                ->with('success','El usuario fue eliminado correctamente');

        } catch (\Exception $e) {

            return back()
                ->with('warning','Un error ocurrio al eliminar el usuario')
                ->withInputs();

        }


    }

}

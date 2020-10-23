<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Models\CatCliente;
use App\Models\CatIdentificacion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index(Request $request) {

        $clientes = CatCliente::getClientes($request)->paginate(30);

        $tiposCliente = ['prospecto'=>'Prospecto','cliente activo'=>'Cliente Activo','cliente inactivo'=>'Cliente Inactivo'];
        $estatus      = [0=>'Activo',1=>'inactivo'];

        $filtrar = $request->filtro == 0 ? 'mostrar-filtro' : false;

        $filtro['like'] = $request->q_like;
        $filtro['estatus'] = $request->estatus;
        $filtro['tipoCliente'] = $request->tipoCliente;



        return view('administracion.clientes.index',compact('clientes','tiposCliente','estatus','filtro','filtrar'));
    }
    public function create() {
        $cliente = new CatCliente();
        $identificaciones = CatIdentificacion::getIdentificacionesSelect();
        $tiposCliente = ['prospecto'=>'Prospecto','cliente activo'=>'Cliente Activo','cliente inactivo'=>'Cliente Inactivo'];
        return view('administracion.clientes.create',compact('cliente','identificaciones','tiposCliente'));
    }
    public function store(ClienteStoreRequest $request) {
        try {
            $cliente                   = new CatCliente();

            $cliente->nombre           = $request->nombre;
            $cliente->apellidoPaterno  = $request->apellidoPaterno;
            $cliente->apellidoMaterno  = $request->apellidoMaterno;
            $cliente->email            = $request->email;
            $cliente->celular          = $request->celular;
            $cliente->tipoCliente      = $request->tipoCliente;
            $cliente->curp             = $request->curp;
            $cliente->idIdentificacion = $request->idIdentificacion;

            $cliente->save();

            return redirect('clientes');

        }catch (\Exception $exception) {
            dd($exception);
        }
    }
    public function edit($idCliente) {
        $cliente = CatCliente::findOrFail($idCliente);
        $identificaciones = CatIdentificacion::getIdentificacionesSelect();
        $tiposCliente = ['prospecto'=>'Prospecto','cliente activo'=>'Cliente Activo','cliente inactivo'=>'Cliente Inactivo'];
        return view('administracion.clientes.edit',compact('cliente','identificaciones','tiposCliente'));
    }
    public function update(ClienteUpdateRequest $request,$idCliente) {
        try {

            $cliente = CatCliente::findOrFail($idCliente);

            $cliente->nombre           = $request->nombre;
            $cliente->apellidoPaterno  = $request->apellidoPaterno;
            $cliente->apellidoMaterno  = $request->apellidoMaterno;
            $cliente->email            = $request->email;
            $cliente->celular          = $request->celular;
            $cliente->tipoCliente      = $request->tipoCliente;
            $cliente->curp             = $request->curp;
            $cliente->idIdentificacion = $request->idIdentificacion;

            $cliente->save();

            return redirect('clientes');

        }catch (\Exception $exception) {
            dd($exception);
        }
    }
    public function destroy($idCliente) {

        $cliente = CatCliente::findOrFail($idCliente);

        $estatus = $cliente->eliminado == 0 ? 1 : 0;

        $cliente->eliminado   = $estatus;
        $cliente->tipoCliente = $estatus == 0 ? 'cliente activo' : 'cliente inactivo';
        $cliente->save();

        return redirect('clientes');

    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoteStoreRequest;
use App\Models\CatEmpresa;
use App\Models\CatEstado;
use App\Models\CatMunicipio;
use App\Models\Fraccionamiento;
use App\Models\tblCoordenada;
use App\Models\TblLote;
use Illuminate\Http\Request;

class LoteController extends Controller
{

    public function index($idFraccionamiento) {
        $fraccionamiento    = Fraccionamiento::findOrFail($idFraccionamiento);
        $lotes              = TblLote::getLotesByIdFraccionamiento($fraccionamiento->idFraccionamiento)->get();
        $empresa         = CatEmpresa::findOrFail($fraccionamiento->idEmpresa);
        $municipio       = CatMunicipio::findOrFail($fraccionamiento->idMunicipio);
        $estado          = CatEstado::findOrFail($municipio->estado_id);
        return view('administracion.fraccionamientos.lotes.index',compact('fraccionamiento','lotes','empresa','estado','municipio'));
    }

    public function createInforamation($idFraccionamiento) {
        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);
        $empresa         = CatEmpresa::findOrFail($fraccionamiento->idEmpresa);
        $municipio       = CatMunicipio::findOrFail($fraccionamiento->idMunicipio);
        $estado          = CatEstado::findOrFail($municipio->estado_id);
        $coordenadas = tblCoordenada::getCoordenadas($idFraccionamiento)->get();
        $lote            = new TblLote();
        return view('administracion.fraccionamientos.lotes.create-information',compact('fraccionamiento','lote','empresa','estado','municipio','municipio','coordenadas'));
    }

    public function storeInformation(LoteStoreRequest $request, $idFraccionamiento) {

        try{

            $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);

            $lote = new TblLote();

            $lote->numeroLote = $request->numeroLote;
            $lote->manzana = $request->numeroManzana;
            $lote->color = $request->color;
            $lote->descripcion = $request->descripcion;
            $lote->idFraccionamiento = $fraccionamiento->idFraccionamiento;

            $lote->save();

            return redirect('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/lotes/'.$lote->idLote.'/create-area-location');

        }catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function createAreaLocation($idFraccionamiento,$idLote) {

        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);
        $coordenadas = tblCoordenada::getCoordenadas($idFraccionamiento)->get();
        $lote = TblLote::findOrFail($idLote);

        return view('administracion.fraccionamientos.lotes.create-area-location',
            compact(
                'fraccionamiento',
                'lote',
                'coordenadas'
            )
        );

    }
    public function storeAreaLocation($idFraccionamiento) {

    }


}

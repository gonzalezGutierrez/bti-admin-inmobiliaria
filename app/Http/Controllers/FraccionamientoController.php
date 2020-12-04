<?php

namespace App\Http\Controllers;

use App\Http\Requests\FraccionamientoStoreRequest;
use App\Models\CatEmpresa;
use App\Models\CatEstado;
use App\Models\CatMunicipio;
use App\Models\Fraccionamiento;
use App\Models\tblCoordenada;
use App\Models\TblImagenFraccionamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use PhpParser\JsonDecoder;
use function MongoDB\BSON\toJSON;

class FraccionamientoController extends Controller
{

    public function index (Request $request) {
        $like = $request->like;
        $fraccionamientos = Fraccionamiento::fraccionamientos($like)->paginate(20);
        return view('administracion.fraccionamientos.index',compact('fraccionamientos','like'));
    }

    public function createInformation() {

        $estados = CatEstado::pluck('nombre','id');
        $empresas = CatEmpresa::where('eliminado',0)->pluck('empresa','idEmpresa');
        $fraccionamiento = new Fraccionamiento();

        return view('administracion.fraccionamientos.create-information',compact('estados','empresas','fraccionamiento'));

    }

    public function storeInformation (FraccionamientoStoreRequest $request) {

        try {

            $path = public_path().'\imagenes';
            $file = $request->file('foto');

            $imagenOriginal = $file;
            $imagen = Image::make($imagenOriginal);
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(400,400);
            $imagen->save($path . '/'.$temp_name, 100);


            $fraccionamiento = new Fraccionamiento();
            $fraccionamiento->idEmpresa = $request->idEmpresa;
            $fraccionamiento->fraccionamiento = $request->fraccionamiento;
            $fraccionamiento->idMunicipio = $request->idMunicipio;
            $fraccionamiento->direccion = $request->direccion;
            $fraccionamiento->descripcion = $request->descripcion;
            $fraccionamiento->url_img_lotes_fraccionado = $temp_name;
            $fraccionamiento->save();

            return redirect("fraccionamientos/{$fraccionamiento->idFraccionamiento}/create-area-location")
                ->with('success','La información del fraccionamiento se ha almacenado correctamente');

        }catch (\Exception $exception){

            dd($exception);

        }
    }

    public function createAreaLocation($idFraccionamiento) {
        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);
        return view('administracion.fraccionamientos.create-area-location',compact('fraccionamiento'));
    }

    public function storeAreaLocation(Request $request) {

        try {

            $coordenadas = $request->all()['coordenadas'];
            $idFraccionamiento = $request->idFraccionamiento;

            foreach ($coordenadas as $coordenada) {

                $latLng  = explode(',',$coordenada);

                $lat     = explode(':',$latLng[0])[1];
                $lng     = explode(':',$latLng[1])[1];

                $tblCoordenadas = new tblCoordenada();
                $tblCoordenadas->latitud = $lat;
                $tblCoordenadas->longitud = $lng;
                $tblCoordenadas->idFraccionamiento = $idFraccionamiento;
                $tblCoordenadas->save();

            }

            return response()->json([
                'msg'=>'Las coordenadas del fraccionamiento fueron almacenados correctamente',
            ],201);

        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function createAddImages($idFraccionamiento) {

        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);

        $empresa = CatEmpresa::findOrFail($fraccionamiento->idEmpresa);

        $municipio = CatMunicipio::findOrFail($fraccionamiento->idMunicipio);

        $estado    = CatEstado::findOrFail($municipio->estado_id);

        $coordenadas = tblCoordenada::getCoordenadas($idFraccionamiento)->get();

        return view("administracion.fraccionamientos.create-add-image",compact(
            'fraccionamiento',
            'estado',
            'empresa',
            'municipio',
            'estado',
            'coordenadas'
        ));


    }

    public function storeAddImages(Request  $request, $idFraccionamiento) {

        $path = public_path().'\imagenes';
        $file = $request->file('file');

        $imagenOriginal = $file;
        $imagen = Image::make($imagenOriginal);
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
        $imagen->resize(400,400);
        $imagen->save($path . '/fraccionamientos/'.$temp_name, 100);

        $image = new TblImagenFraccionamiento();
        $image->url_imagen = $temp_name;
        $image->idFraccionamiento = $idFraccionamiento;
        $image->save();

        return response()->json(['success' => $temp_name],201);

    }

    public function editInformation($idFraccionamiento) {

        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);
        $estados = CatEstado::pluck('nombre','id');
        $empresas = CatEmpresa::where('eliminado',0)->pluck('empresa','idEmpresa');

        $municipio = CatMunicipio::findOrFail($fraccionamiento->idMunicipio);
        $estado    = CatEstado::findOrFail($municipio->estado_id);

        return view('administracion.fraccionamientos.edit-information',
            compact(
                'fraccionamiento',
                'estados',
                'empresas',
                'municipio',
                'estado'
            )
        );

    }

    public function updateInformation( FraccionamientoStoreRequest $request , $idFraccionamiento ) {

        try {

            $fraccionamiento                  = Fraccionamiento::findOrFail($idFraccionamiento);

            $fraccionamiento->idEmpresa       = $request->idEmpresa;
            $fraccionamiento->fraccionamiento = $request->fraccionamiento;
            $fraccionamiento->idMunicipio     = $request->idMunicipio;
            $fraccionamiento->direccion       = $request->direccion;
            $fraccionamiento->descripcion     = $request->descripcion;
            $fraccionamiento->save();

            return redirect('/fraccionamientos');


        }catch (\Exception $exception) {

            dd($exception);

        }

    }

    public function editAreaLocation($idFraccionamiento) {

        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);
        $coordenadas = tblCoordenada::getCoordenadas($idFraccionamiento)->get();
        return view('administracion.fraccionamientos.edit-area-location',compact('fraccionamiento','coordenadas'));


    }

    public function updateAreaLocation(Request $request) {

        DB::beginTransaction();
        try {

            $coordenadas = $request->all()['coordenadas'];
            $fraccionamiento = Fraccionamiento::findOrFail($request->idFraccionamiento);

            tblCoordenada::where('idFraccionamiento',$fraccionamiento->idFraccionamiento)->delete();


            foreach ($coordenadas as $coordenada) {

                $latLng  = explode(',',$coordenada);

                $lat     = explode(':',$latLng[0])[1];
                $lng     = explode(':',$latLng[1])[1];

                $tblCoordenadas = new tblCoordenada();
                $tblCoordenadas->latitud = $lat;
                $tblCoordenadas->longitud = $lng;
                $tblCoordenadas->idFraccionamiento = $fraccionamiento->idFraccionamiento;
                $tblCoordenadas->save();

            }

            DB::commit();

            return response()->json([
                'msg'=>'Las coordenadas del fraccionamiento fueron almacenados correctamente',
            ],201);

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

    }

    public function show($idFraccionamiento) {
        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);
        $empresa         = CatEmpresa::findOrFail($fraccionamiento->idEmpresa);
        $municipio       = CatMunicipio::findOrFail($fraccionamiento->idMunicipio);
        $estado          = CatEstado::findOrFail($municipio->estado_id);
        $coordenadas = tblCoordenada::getCoordenadas($idFraccionamiento)->get();
        return view("administracion.fraccionamientos.show",compact('fraccionamiento','coordenadas','empresa','municipio','estado'));
    }

    public function imagenes($idFraccionamiento) {

        $fraccionamiento = Fraccionamiento::findOrFail($idFraccionamiento);

        $images = TblImagenFraccionamiento::getImagesByIdFraccionamiento($fraccionamiento->idFraccionamiento)->get();

        $empresa         = CatEmpresa::findOrFail($fraccionamiento->idEmpresa);
        $municipio       = CatMunicipio::findOrFail($fraccionamiento->idMunicipio);
        $estado          = CatEstado::findOrFail($municipio->estado_id);

        return view('administracion.fraccionamientos.images',compact('fraccionamiento','images','empresa','municipio','estado'));
    }

    public function getMunicipiosWithIdEstado($idEstado) {
        $municipios = CatMunicipio::getwithIdEstado($idEstado)->get();
        return response()->json($municipios,200);
    }


    protected function random_string() {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
        for($i=0; $i<10; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

}

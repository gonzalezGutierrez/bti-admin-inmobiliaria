<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'auth'],function(){
    Route::get('login',  [App\Http\Controllers\AuthController::class, 'form'])->name('login');
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);

});


Route::group(['middleware'=>'auth'],function(){

    Route::get('/usuarios',[App\Http\Controllers\UsuarioController::class, 'index']);
    Route::get('/usuarios/create',[App\Http\Controllers\UsuarioController::class, 'create']);
    Route::post('/usuarios', [App\Http\Controllers\UsuarioController::class, 'store']);

    Route::get('/clientes',[App\Http\Controllers\ClienteController::class, 'index']);
    Route::get('/clientes/create',[App\Http\Controllers\ClienteController::class, 'create']);
    Route::post('/clientes',[App\Http\Controllers\ClienteController::class, 'store']);
    Route::get('/clientes/{id}/edit',[App\Http\Controllers\ClienteController::class, 'edit']);
    Route::put('/clientes/{id}',[App\Http\Controllers\ClienteController::class, 'update']);
    Route::delete('/clientes/{id}',[App\Http\Controllers\ClienteController::class, 'destroy']);


    /*************************************FRACCIONAMIENTOS****************************************************/

    Route::get('fraccionamientos',[App\Http\Controllers\FraccionamientoController::class,'index']);

    Route::get('fraccionamientos/create-information',[App\Http\Controllers\FraccionamientoController::class,'createInformation']);
    Route::get('fraccionamientos/obtener-municipios/{idEstado}',[App\Http\Controllers\FraccionamientoController::class,'getMunicipiosWithIdEstado']);

    Route::get('fraccionamientos/{idFraccionamiento}/create-area-location',[App\Http\Controllers\FraccionamientoController::class,'createAreaLocation']);
    Route::get('fraccionamientos/{idFraccionamiento}/create-add-images',[App\Http\Controllers\FraccionamientoController::class,'createAddImages']);

    Route::post('fraccionamientos/store-information',[App\Http\Controllers\FraccionamientoController::class,'storeInformation']);
    Route::post('fraccionamientos/store-area-location',[App\Http\Controllers\FraccionamientoController::class,'storeAreaLocation']);
    Route::post('fraccionamientos/{idFraccionamiento}/store-add-images',[App\Http\Controllers\FraccionamientoController::class,'storeAddImages']);

    Route::get('fraccionamientos/{idFraccionamiento}/edit-information',[\App\Http\Controllers\FraccionamientoController::class,'editInformation']);
    Route::get('fraccionamientos/{idFraccionamiento}/edit-area-location',[\App\Http\Controllers\FraccionamientoController::class,'editAreaLocation']);

    Route::get('fraccionamientos/obtener-coordenadas/{idFraccionamiento}',[\App\Http\Controllers\FraccionamientoController::class,'getCoordenadas']);

    Route::put('fraccionamientos/{idFraccionamiento}/update-information',[\App\Http\Controllers\FraccionamientoController::class,'updateInformation']);
    Route::put('fraccionamientos/update-area-location',[\App\Http\Controllers\FraccionamientoController::class,'updateAreaLocation']);

    Route::get('fraccionamientos/{idFraccionamiento}',[\App\Http\Controllers\FraccionamientoController::class,'show']);

    Route::get('fraccionamientos/{idFraccionamiento}/imagenes',[\App\Http\Controllers\FraccionamientoController::class,'imagenes']);

    /*****************************************************LOTES****************************************************************/

    Route::get('fraccionamientos/{idFraccionamiento}/lotes',[\App\Http\Controllers\LoteController::class,'index']);

    Route::get('fraccionamientos/{idFraccionamiento}/lotes/create-information',[\App\Http\Controllers\LoteController::class,'createInforamation']);
    Route::post('fraccionamientos/{idFraccionamiento}/lotes/store-information',[\App\Http\Controllers\LoteController::class,'storeInformation']);

    Route::get('fraccionamientos/{idFraccionamiento}/lotes/{idLote}/create-area-location',[\App\Http\Controllers\LoteController::class,'createAreaLocation']);

});



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

Route::get('/usuarios',[App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/usuarios/create',[App\Http\Controllers\UsuarioController::class, 'create']);
Route::post('/usuarios', [App\Http\Controllers\UsuarioController::class, 'store']);

Route::get('/clientes',[App\Http\Controllers\ClienteController::class, 'index']);
Route::get('/clientes/create',[App\Http\Controllers\ClienteController::class, 'create']);
Route::post('/clientes',[App\Http\Controllers\ClienteController::class, 'store']);
Route::get('/clientes/{id}/edit',[App\Http\Controllers\ClienteController::class, 'edit']);
Route::put('/clientes/{id}',[App\Http\Controllers\ClienteController::class, 'update']);
Route::delete('/clientes/{id}',[App\Http\Controllers\ClienteController::class, 'destroy']);


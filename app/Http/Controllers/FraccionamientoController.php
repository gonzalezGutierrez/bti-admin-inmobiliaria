<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FraccionamientoController extends Controller
{

    public function index () {
        return view('administracion.fraccionamientos.index');
    }

    public function createInformation() {

    }
    public function storeInformation (Request $request) {

    }

    public function createAreaLocation($idFraccionamiento) {

    }
    public function storeAreaLocation(Request  $request) {

    }

    public function createAddImages($idFraccionamiento) {

    }
    public function storeAddImages(Request  $request) {

    }

}

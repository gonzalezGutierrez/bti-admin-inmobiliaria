@extends('layouts.template_master')
@section('title','Registro de lotes')

@section('css')

@stop

@section('content')

    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-plus"></i>
        </div>
        <div class="header-title">
            <h1>Registro de fraccionamientos</h1>
            <small>Registra nuevos fraccionamientos en el sistema.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('/fraccionamientos')}}">Fraccionamiento</a></li>
                <li><a href="{{asset('/fraccionamientos/'.$fraccionamiento->idFraccionamiento)}}">{{$fraccionamiento->fraccionamiento}}</a></li>
                <li><a href="{{asset('/fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/lotes')}}">Lotes</a></li>
                <li class="active">Agregar lote</li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading text-center">
                    <h4 class="text-uppercase">Datos del fraccionamiento</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex">
                            <div class="text-left">
                                <strong>Fraccionamiento</strong>
                            </div>
                            <div class="text-right">
                                <span>{{$fraccionamiento->fraccionamiento}}</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            <div class="text-left">
                                <strong>Empresa</strong>
                            </div>
                            <div class="text-right">
                                <span>{{$empresa->empresa}}</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            <div class="text-left">
                                <strong>Ubicación</strong>
                            </div>
                            <div class="text-right">
                                <span>{{$municipio->nombre}} {{$estado->nombre}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <h4 style="padding: 5px; text-align: center; text-transform: uppercase;">Imagen fraccionada</h4>
                <div class="panel-body text-center" style="padding: 0px;">
                    <img style="width: 100%; height: 400px;" src="{{asset('imagenes/'.$fraccionamiento->url_img_lotes_fraccionado)}}" alt="">
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                    <div class="panel-title d-flex">
                        <div class="text-white">
                            <i class="ti-map text-white"></i>
                            <h4 class="text-uppercase">Listado de lotes</h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID Lote</th>
                                <th>Color</th>
                                <th class="text-center">Lote</th>
                                <th class="text-center">Manzana</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lotes as $lote)
                                <tr>
                                    <td class="text-center">{{$lote->idLote}}</td>
                                    <td class="text-center">
                                        <div class="icon-initial-name text-center justify-content-center" style="background-color:{{$lote->color}};">
                                            <span>C</span>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$lote->numeroLote}}</td>
                                    <td class="text-center">{{$lote->manzana}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@stop


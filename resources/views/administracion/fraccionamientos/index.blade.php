@extends('layouts.template_master')
@section('content')
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-map-marker"></i>
        </div>
        <div class="header-title">
            <h1>Administración - Catalogo de fraccionamientos</h1>
            <small class="text-uppercase">{{$fraccionamientos->count()}} registros encontrados</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> RESUMEN</a></li>
                <li class="active">FRACCIONAMIENTOS</li>
            </ol>
        </div>
    </div>
    <div class="row">

        <div class="col-12 col-md-12 col-lg-12 col-xs-12 col-sm-12">


            <div class="panel panel-bd">
                <div class="panel-heading bg-primary">
                    <div class="panel-title d-flex">
                        <div class="text-white">
                            <i class="ti-home text-white"></i>
                            <h4>LISTADO DE FRACCIONAMIENTOS</h4>
                        </div>
                        <form action="{{asset('/fraccionamientos')}}" method="GET">
                            <input type="search" class="form-control" value="{{$like}}" name="like" placeholder="Buscar...">
                        </form>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="text-right">
                        <a href="{{asset('fraccionamientos/create-information')}}" class="btn btn-primary"> <span class="fa fa-plus"></span> Nuevo</a>
                    </div>

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID Fraccionamiento</th>
                                <th class="text-center">Fraccionamiento</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Ubicación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fraccionamientos as $fraccionamiento)
                                <tr class="text-center">
                                    <td>{{$fraccionamiento->idFraccionamiento}}</td>
                                    <td class="text-uppercase">{{$fraccionamiento->fraccionamiento}}</td>
                                    <td>{{$fraccionamiento->empresa}}</td>
                                    <td>{{$fraccionamiento->municipio}} {{$fraccionamiento->estado}}</td>
                                    <td>
                                        <a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento)}}" class="btn btn-primary btn-sm"><i class="fa fa-chevron-circle-right"></i></a>
                                        <a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/edit-information')}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['url'=>'','class'=>'form-inline','method'=>'PATCH']) !!}
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        {{$fraccionamientos->links()}}
                    </div>
                </div>
            </div>


        </div>

        {{--@foreach($fraccionamientos as $fraccionamiento)
            <div class=" col-lg-6 col-xs-12 col-sm-12 col-md-6">
                <div class="panel">
                    <div class="panel-heading bg-primary d-flex">
                        <strong>Fraccionamiento :</strong> <span class="text-bold text-uppercase">{{$fraccionamiento->fraccionamiento}}</span>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th class="text-uppercase">Empresa</th>
                                <th class="text-left">{{$fraccionamiento->empresa}}</th>
                            </tr>
                            <tr>
                                <th class="text-uppercase">Estado</th>
                                <th class="text-left">{{$fraccionamiento->estado}}</th>
                            </tr>
                            <tr>
                                <th class="text-uppercase">Ciudad</th>
                                <th class="text-left">{{$fraccionamiento->municipio}}</th>
                            </tr>
                            <tr>
                                <th class="text-uppercase">Dirección</th>
                                <th class="text-left">{{$fraccionamiento->direccion}}</th>
                            </tr>
                            <tr>
                                <th class="text-uppercase">Descripción</th>
                                <th class="text-left">{{$fraccionamiento->descripcion}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-map-marker"></i> Ver en mapa</a>
                    </div>
                </div>
            </div>
        @endforeach--}}
    </div>
@stop

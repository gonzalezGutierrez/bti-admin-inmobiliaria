@extends('layouts.template_master')
@section('content')
    <div class="content-header">
        <div class="header-icon"><i class="fa fa-image"></i></div>
        <div class="header-title">
            <h1>Imagenes del fraccionamiento</h1>
            <small>Imagenes disponibles del fraccionamiento</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('fraccionamientos')}}">Fraccionamientos</a></li>
                <li><a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento)}}">{{$fraccionamiento->fraccionamiento}}</a></li>
                <li class="active">Imagenes</li>
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
                            <i class="ti-image text-white"></i>
                            <h4 class="text-uppercase">Listado de lotes</h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="carousel-1" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="1"></li>
                            <li data-target="#carousel-1" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            @foreach($images as $image)
                                @if($loop->index == 0)
                                    <div class="item active">
                                        <img style="width: 100%;" src="{{asset('imagenes/fraccionamientos/'.$image->url_imagen)}}" alt="...">
                                    </div>
                                @else
                                    <div class="item">
                                        <img style="width: 100%;" src="{{asset('imagenes/fraccionamientos/'.$image->url_imagen)}}" alt="...">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

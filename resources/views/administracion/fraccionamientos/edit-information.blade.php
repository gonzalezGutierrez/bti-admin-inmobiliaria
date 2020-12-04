@extends('layouts.template_master')
@section('title','Actualizar información del fraccionamiento')

@section('css')

@stop

@section('content')
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-plus"></i>
        </div>
        <div class="header-title">
            <h1>Actualizar fraccionamiento</h1>
            <small>Actualiza los datos del fraccionamiento.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('/fraccionamientos')}}">Fraccionamiento</a></li>
                <li><a href="{{asset('/fraccionamientos/'.$fraccionamiento->idFraccionamiento)}}">{{$fraccionamiento->fraccionamiento}}</a></li>
                <li class="active">Actualizar</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-right m-b-10">
            <a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/edit-area-location')}}" class="btn btn-primary">
                <i class="fa fa-map-marker"></i> Actualizar area
            </a>
            <a href="" class="btn btn-primary"><i class="fa fa-image"></i> Actualizar Imagenes</a>
        </div>
        <div class="col-sm-12">
            {!! Form::open(['url'=>'fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/update-information','method'=>'PUT']) !!}
            <div class="panel">
                <div class="panel-heading bg-primary">
                    <h4 class="text-uppercase">Agrega la información del fraccionamiento</h4>
                </div>
                <div class="panel-body">
                    @include('administracion.fraccionamientos.form-information')
                </div>
                <div class="panel-footer">
                    <a href="{{asset('/fraccionamientos')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                    <button type="submit" class="btn  btn-primary"><i class="fa fa-chevron-circle-right"></i> Guardar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('assets/libraries/axios/axios.min.js')}}"></script>
    <script src="{{asset('assets/pages/forms/fraccionamientos/create-information/main.js')}}"></script>
    <script>

        let municipioId       = {{$municipio->id}};
        let estadoId          = {{$estado->id}};
        let createInformation = new FraccionamientoCreateInformation(municipioId,estadoId);

    </script>
@stop

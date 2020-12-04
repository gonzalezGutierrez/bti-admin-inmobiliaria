@extends('layouts.template_master')
@section('title','Registro de clientes')

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
                <li class="active">Agregar información</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['url'=>'fraccionamientos/store-information','method'=>'POST','file'=>'true','enctype'=>'multipart/form-data']) !!}
                <div class="panel">
                    <div class="panel-heading bg-primary">
                        <h4 class="text-uppercase">Agrega la información del fraccionamiento</h4>
                    </div>
                    <div class="panel-body">
                        @include('administracion.fraccionamientos.form-information')
                    </div>
                    <div class="panel-footer">
                        <a href="{{asset('/fraccionamientos')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                        <button type="submit" class="btn  btn-primary"><i class="fa fa-chevron-circle-right"></i> Siguiente</button>
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
        let createInformation = new FraccionamientoCreateInformation();
    </script>
@stop

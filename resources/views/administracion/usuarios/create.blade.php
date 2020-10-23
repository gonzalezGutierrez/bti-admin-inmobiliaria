@extends('layouts.template_master')
@section('title','Registro de usuarios')

@section('css')

@stop

@section('content')
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-add-user"></i>
        </div>
        <div class="header-title">
            <h1>Registro de usuarios</h1>
            <small>Registra nuevos usuarios en el sistema.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('/usuarios')}}">Usuarios</a></li>
                <li class="active">Agregar nuevo</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['url'=>'usuarios','method'=>'post','class'=>'','id'=>'formularioRegistroUsuario']) !!}
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <h4 class="text-uppercase">Ingresa los datos del usuario</h4>
                    </div>
                    <div class="panel-body">
                        @include('administracion.usuarios.form')
                    </div>
                    <div class="panel-footer text-left">
                        <a href="{{asset('/usuarios')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                        <button type="submit" class="btn  btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
@stop

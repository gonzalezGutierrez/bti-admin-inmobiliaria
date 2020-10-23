@extends('layouts.template_master')
@section('title','Registro de clientes')

@section('css')

@stop

@section('content')
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-add-user"></i>
        </div>
        <div class="header-title">
            <h1>Registro de clientes</h1>
            <small>Registra nuevos clientes en el sistema.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('/clientes')}}">Clientes</a></li>
                <li class="active">Agregar nuevo</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['url'=>'clientes','method'=>'post','class'=>'','id'=>'formularioRegistroCliente']) !!}
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <h4 class="text-uppercase">Ingresa los datos del cliente</h4>
                </div>
                <div class="panel-body">
                    @include('administracion.clientes.form')
                </div>
                <div class="panel-footer text-left">
                    <a href="{{asset('/clientes')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                    <button type="submit" class="btn  btn-primary"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
@stop

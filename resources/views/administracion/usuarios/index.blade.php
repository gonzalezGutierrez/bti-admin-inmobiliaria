@extends('layouts.template_master')
@section('title','Usuarios del sistema')

@section('css')

@stop

@section('content')
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-bookmarks"></i>
        </div>
        <div class="header-title">
            <h1>Administración - Catalogo de usuarios</h1>
            <small>Visualiza el listado de usuarios disponibles</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> RESUMEN</a></li>
                <li class="active">USUARIOS</li>
            </ol>
        </div>
    </div>
    <div class="row">
        {{--@if($filtrar == 'mostrar-filtro')
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
            <span @if($filtro['like'] == null) style="display: none !important;"  @endif class="label m-r-2 text-uppercase activo">
                <i class="fa fa-search"></i> Palabra clave: {{$filtro['like']}}
                 <i class="fa fa-times-circle pointer" id="times-keyword"></i>
            </span>
                <span @if($filtro['tipoCliente'] == null) style="display: none !important;" @endif class="label text-uppercase m-r-2 activo">
                <i class="fa fa-search"></i> Tipo de usuario: {{$filtro['tipoCliente']}}
                 <i class="fa fa-times-circle pointer" id="times-type-customer"></i>
            </span>
                <span @if($filtro['estatus'] == null) style="display: none !important;" @endif class="label text-uppercase m-r-2 activo"> <i class="fa fa-search"></i>
                Estatus:
                @if ($filtro['estatus'] == 0) Activo @else Inactivo @endif
                <i class="fa fa-times-circle pointer" id="times-status"></i>
            </span>
            </div>
        @endif--}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="panel-title d-flex">
                        <div>
                            <i class="ti-user"></i>
                            <h4>LISTADO DE USUARIOS</h4>
                        </div>
                        <i data-toggle="modal" data-target="#modal-filter-customers" class="ti-search pointer"></i>
                    </div>
                    {!! Form::open(['url'=>'usuarios','method'=>'GET','id'=>'formFilter']) !!}
                    <div class="modal fade" id="modal-filter-customers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-uppercase" id="exampleModalLabel">Buscar Usuarios</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-inverse" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary"> <i class="material-icons">search</i> Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Rol</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>
                                        <div class="icon-initial-name justify-content-center activo">
                                            <span>{{$usuario->nombre[0]}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        {{$usuario->nombre}} {{$usuario->apellido}}
                                    </td>
                                    <td>
                                        {{$usuario->email}}
                                    </td>
                                    <td>
                                        {{$usuario->celular}}
                                    </td>
                                    <td>
                                        <span class="label text-uppercase {{$usuario->rol}}">{{$usuario->rol}}</span>
                                    </td>
                                    <td>
                                        <span class=" text-uppercase label @if($usuario->eliminado == 0) activo @else inactivo @endif">
                                                @if($usuario->eliminado == 0) Activo @else dado de baja @endif
                                        </span>
                                    </td>
                                    <td>

                                        <a href="{{asset('usuarios/'.$usuario->idUsuario.'/edit')}}"  class="btn btn-primary text-uppercase btn-xs">
                                            <i class="fa fa-edit"></i> Actualizar
                                        </a>

                                        {!! Form::open(['url'=>'usuarios/'.$usuario->idUsuario,'method'=>'delete','class'=>'form-inline']) !!}
                                            <button type="button" class="btn text-uppercase @if($usuario->eliminado == 0) btn-danger @else btn-success @endif btn-xs">
                                                <i class="fa @if($usuario->eliminado == 0) fa-trash @else fa-check @endif "></i>
                                                @if($usuario->eliminado == 0) Eliminar @else Activar @endif
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            {{--@foreach($clientes as $cliente)
                                <tr>
                                    <td>
                                        <div class="icon-initial-name justify-content-center
                                                @if($cliente->tipoCliente =='cliente activo') activo
                                                @elseif($cliente->tipoCliente == 'prospecto') prospecto
                                                @else inactivo
                                                @endif">
                                            <span>{{$cliente->nombre[0]}}</span>
                                        </div>
                                    </td>
                                    <td>{{$cliente->nombre}} {{$cliente->apellidoPaterno}} {{$cliente->apellidoMaterno}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->celular}}</td>
                                    <td>
                                            <span class="text-uppercase label
                                                @if($cliente->tipoCliente =='cliente activo') activo
                                                @elseif($cliente->tipoCliente == 'prospecto') prospecto
                                                @else inactivo
                                                @endif">
                                                    {{$cliente->tipoCliente}}
                                            </span>
                                    </td>
                                    <td>
                                            <span class=" text-uppercase label @if($cliente->eliminado == 0) activo @else inactivo @endif">
                                                @if($cliente->eliminado == 0) Activo @else dado de baja @endif
                                            </span>
                                    </td>
                                    <td>
                                        <a href="{{asset('clientes/'.$cliente->idCliente.'/edit')}}"  class="btn btn-primary text-uppercase btn-xs">
                                            <i class="fa fa-edit"></i> Actualizar
                                        </a>

                                        {!! Form::open(['url'=>'clientes/'.$cliente->idCliente,'method'=>'delete','class'=>'form-inline']) !!}
                                        <button type="button" class="btn text-uppercase @if($cliente->eliminado == 0) btn-danger @else btn-success @endif btn-xs">
                                            <i class="fa @if($cliente->eliminado == 0) fa-trash @else fa-check @endif "></i>
                                            @if($cliente->eliminado == 0) Eliminar @else Activar @endif
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Inmobiliaria : Login</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="assets/dist/img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets/dist/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets/dist/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="assets/dist/img/ico/apple-touch-icon-144-precomposed.png">

    <!-- Bootstrap -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="{{asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{asset('assets/dist/css/component_ui.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/component_ui_rtl.css" rel="stylesheet" type="text/css"/>-->
    <!-- Custom css -->
    <link href="{{asset('assets/dist/css/custom.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- Content Wrapper -->
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>Login</h3>
                        <small><strong>Porfavor ingresa tus credenciales para acceder</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if(Session::has('login_false'))
                    <div class="alert alert-danger">
                        <strong>{{Session::get('login_false')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {!! Form::open(['url'=>'auth/login','method'=>'POST']) !!}
                    <div class="form-group">
                        <label class="control-label">Nombre de usuario</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" value="{{Session::get('nombreUsuario')}}" name="nombreUsuario" class="form-control" placeholder="Nombre de Usuario">
                        </div>
                        @error('nombreUsuario')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="pass" type="password" class="form-control" name="password" placeholder="******">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary pull-right">Acceder</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div id="bottom_text">
            ¿Olvidaste tu <a href="#">Contraseña ?</a>
        </div>

    </div>
</div>

<script src="{{asset('assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

</body>
</html>

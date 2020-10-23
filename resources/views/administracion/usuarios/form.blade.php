<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('nombre','Nombre(s) *') !!}
            {!! Form::text('nombre',$user->nombre != null ? $user->nombre : old('nombre'),['class'=>'form-control form-control-lg required','id'=>'nombreUsuario']) !!}
            @error('nombre')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('apellido','Apellido(s) *') !!}
            {!! Form::text('apellido',$user->apellido != null ? $user->apellido : old('apellido'),['class'=>'form-control form-control-lg', 'id'=>'apellidoUsuario']) !!}
            @error('apellido')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('celular','Celular *') !!}
            {!! Form::text('celular',$user->celular != null ? $user->celular : old('celular'),['class'=>'form-control form-control-lg required']) !!}
            @error('celular')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('email','Email *') !!}
            {!! Form::email('email',$user->email != null ? $user->email : old('email'),['class'=>'form-control form-control-lg required']) !!}
            @error('email')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('idRol','Rol *') !!}
            {!! Form::select('idRol',$roles,$user->idRol != null ? $user->idRol : old('idRol'),['class'=>'form-control form-control-lg','placeholder'=>'Selecciona un elemento...']) !!}
            @error('idRol')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('password','Contraseña *') !!}
            {!! Form::password('password',['class'=>'form-control form-control-lg required']) !!}
            @error('password')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('password_confirmation','Confirma tu contraseña *') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control form-control-lg']) !!}
            @error('password_confirmation')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
</div>

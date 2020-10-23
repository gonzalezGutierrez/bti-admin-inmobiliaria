<div class="row">
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('nombre','Nombre(s) *') !!}
            {!! Form::text('nombre',$cliente->nombre != null ? $cliente->nombre : old('nombre'),['class'=>'form-control form-control-lg required','id'=>'nombreUsuario']) !!}
            @error('nombre')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('apellidoPaterno','Apellido Paterno *') !!}
            {!! Form::text('apellidoPaterno',$cliente->apellidoPaterno != null ? $cliente->apellidoPaterno : old('apellidoPaterno'),['class'=>'form-control form-control-lg', 'id'=>'apellidoUsuario']) !!}
            @error('apellidoPaterno')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('apellidoMaterno','Apellido Materno *') !!}
            {!! Form::text('apellidoMaterno',$cliente->apellidoMaterno != null ? $cliente->apellidoMaterno : old('apellidoMaterno'),['class'=>'form-control form-control-lg', 'id'=>'apellidoUsuario']) !!}
            @error('apellidoMaterno')
            <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('codigo','Codigo de cliente') !!}
            {!! Form::text('codigo',$cliente->codigo != null ? $cliente->codigo : old('codigo'),['class'=>'form-control form-control-lg required','id'=>'codigoUsuario']) !!}
            @error('codigo')
            <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('email','Email del cliente *') !!}
            {!! Form::text('email',$cliente->email != null ? $cliente->email : old('email'),['class'=>'form-control form-control-lg', 'id'=>'emailUsuario']) !!}
            @error('email')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('celular','Celular del cliente *') !!}
            {!! Form::text('celular',$cliente->celular != null ? $cliente->celular : old('celular'),['class'=>'form-control form-control-lg', 'id'=>'celularUsuario']) !!}
            @error('celular')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('idIdentificacion','Identificacion del cliente *') !!}
            {!! Form::select('idIdentificacion',$identificaciones,$cliente->idIdentificacion != null ? $cliente->idIdentificacion : old('idIdentificacion'),['class'=>'form-control form-control-lg', 'id'=>'emailUsuario','placeholder'=>'Selecciona un elemento...']) !!}
            @error('idIdentificacion')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('curp','Curp del cliente *') !!}
            {!! Form::text('curp',$cliente->curp != null ? $cliente->curp : old('curp'),['class'=>'form-control form-control-lg', 'id'=>'emailUsuario']) !!}
            @error('curp')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('tipoCliente','Tipo de cliente *') !!}
            {!! Form::select('tipoCliente',$tiposCliente,$cliente->tipoCliente != null ? $cliente->tipoCliente : old('tipoCliente'),['class'=>'form-control form-control-lg', 'id'=>'emailUsuario','placeholder'=>'Selecciona un elemento...']) !!}
            @error('tipoCliente')
                <span class="text-danger text-bold text-uppercase">{{$message}}</span>
            @endif
        </div>
    </div>
</div>

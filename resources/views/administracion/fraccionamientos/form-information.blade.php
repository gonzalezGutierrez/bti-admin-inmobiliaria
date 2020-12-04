<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Empresa <span class="text-danger">(*)</span></label>
            {!! Form::select('idEmpresa',$empresas,$fraccionamiento->idEmpresa ? $fraccionamiento->idEmpresa : old('idEmpresa'),['class'=>'form-control','placeholder'=>'Selecciona un elemento...']) !!}
            @error('idEmpresa')
            <span class="label label-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nombre del fraccionamiento <span class="text-danger">(*)</span></label>
            {!! Form::text('fraccionamiento',$fraccionamiento->fraccionamiento ? $fraccionamiento->fraccionamiento : old('fraccionamiento'),['class'=>'form-control']) !!}
            @error('fraccionamiento')
            <span class="label label-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Estado <span class="text-danger">(*)</span></label>
            {!! Form::select('idEstado',$estados,$fraccionamiento->idMunicipio ? $estado->id : old('idEstado'),['class'=>'form-control','placeholder'=>'Selecciona un elemento...','id'=>'selectorEstados']) !!}
            @error('idEstado')
            <span class="label label-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Ciudad / Municipio <span class="text-danger">(*)</span></label>
            {!! Form::select('idMunicipio',[],'',['class'=>'form-control','id'=>'selectorMunicipios']) !!}
            @error('idMunicipio')
            <span class="label label-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Agrega la imagen fraccionada del fraccionamiento</label>
            {!! Form::file('foto',['class'=>'form-control']) !!}
            @error('foto')
                <span class="label label-danger">{{$message}}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Dirección <span class="text-danger">(*)</span></label>
            {!! Form::textarea('direccion',$fraccionamiento->direccion ? $fraccionamiento->direccion : old('direccion'),['class'=>'form-control']) !!}
            @error('direccion')
            <span class="label label-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Descripción <span class="text-danger"></span></label>
            {!! Form::textarea('descripcion',$fraccionamiento->descripcion ? $fraccionamiento->descripcion : old('descripcion'),['class'=>'form-control']) !!}
        </div>
    </div>
</div>

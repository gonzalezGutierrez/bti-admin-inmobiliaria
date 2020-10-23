<input type="hidden" value="0" name="filtro">
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="form-group">
            {!! Form::search('q_like',$filtro['like'] != null ? $filtro['like'] :'',['class'=>'form-control form-group-lg form-control-success','placeholder'=>'Buscar cliente por nombre , apellido , CURP ...','id'=>'inputKeyWord']) !!}
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('tipoCliente','Tipo de cliente *') !!}
            {!! Form::select('tipoCliente',$tiposCliente,$filtro['tipoCliente'] != null ? $filtro['tipoCliente'] :'',['class'=>'form-control form-control-lg', 'id'=>'tipoCliente','placeholder'=>'Selecciona un elemento...']) !!}
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('estatus','Estatus del cliente *') !!}
            {!! Form::select('estatus',$estatus,$filtro['estatus'] != null ? $filtro['estatus'] :'',['class'=>'form-control form-control-lg', 'id'=>'status','placeholder'=>'Selecciona un elemento...']) !!}
        </div>
    </div>
</div>

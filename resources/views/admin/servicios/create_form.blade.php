<?php $title = isset($item) ? $item->name: "agregar servicio" ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            {{ Form::label('name', 'Nro de Contrato') }}
            {{ Form::text('nro_contrato', null, ['class' => 'form-control', 'id' => 'nro_contrato']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('name', 'Tipo Contrato') }}
            {{ Form::select('tipo', ['SERVICIO' => 'Servicio', 'PROFORMA' => 'Proforma'], 'SERVICIO',['class'=>'form-control']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('name', 'Fecha de Contrato') }}
            {{ Form::text('fecha_contrato', null, ['class' => 'form-control', 'id' => 'fecha_contrato']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('name', 'Contratista') }}
            {{ Form::select('contratista_id', $contratistas, null, ['class' => 'form-control','placeholder' => 'Seleccionar']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            {{ Form::label('name', 'Tipo de Seguro') }} <br/>
            @foreach($tipo_seguros as $tipo_seguro)
                <label>
                    {{ Form::checkbox('tipo_seguro_id[]', $tipo_seguro->id) }} {{ $tipo_seguro->nombre }}
                </label>
            @endforeach
        </div>
        <div class="col-md-4">
            {{ Form::label('name', 'Observacion Seguro') }}
            {{ Form::text('obs_tipo_seguro',null,['class'=>'form-control','id'=>'obs_seguro']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            {{ Form::label('name', 'Fecha de Defuncion') }}
            {{ Form::text('fecha_defuncion', null, ['class' => 'form-control', 'id' => 'fecha_defuncion']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('name', 'Dni Difunto') }}
            {{ Form::text('dni_difunto', null, ['class' => 'form-control', 'id' => 'dni_difunto']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('name', 'Nombres Difunto') }}
            {{ Form::text('nombres_difunto', null, ['class' => 'form-control', 'id' => 'nombres_difunto']) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('name', 'Apellidos Difunto') }}
            {{ Form::text('apellidos_difunto', null, ['class' => 'form-control', 'id' => 'apellidos_difunto']) }}
        </div>
    </div>
</div>
<?php $title = isset($item) ? $item->name: "agregar servicio" ?>
<div class="col-md-12">
    <div class="col-md-6">
        {!! Form::text('nro_contrato') !!}
    </div>
    <div class="col-md-6">
        <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" data-date-format="dd/mm/yyyy">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
</div>
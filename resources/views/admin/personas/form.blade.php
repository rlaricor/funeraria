<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <input type = "hidden" name = "servicio_id" value = "{{$id}}">
            {{ Form::label('name', 'Tipo Persona') }}
            {{ Form::select('tipo_persona', ['NATURAL' => 'Natural', 'JURIDICA' => 'Juridica',''], 'NATURAL',['class'=>'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('name', 'Tipo Usuario') }}
            {{ Form::select('tipo_usuario', ['AMBOS' => 'Ambos', 'CONTRATANTE' => 'Contratante','BENEFICIARIO' => 'Beneficiario'], 'CONTRATANTE',['class'=>'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('name', 'Documento') }}
            {{ Form::text('documento_persona', null, ['class' => 'form-control', 'id' => 'documento_persona']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            {{ Form::label('name', 'Nombres') }}
            {{ Form::text('nombres_persona', null, ['class' => 'form-control', 'id' => 'nombres_persona']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('name', 'Apellidos') }}
            {{ Form::text('apellidos_persona', null, ['class' => 'form-control', 'id' => 'apellidos_persona']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span>Celulares</span>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info agregar-celular" title="Agregar Celular">
                        <i class="fa fa-plus" style="vertical-align:middle"></i>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="celulares">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span>Direcciones</span>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info agregar-direccion" title="Agregar Dirección">
                        <i class="fa fa-plus" style="vertical-align:middle"></i>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="direcciones">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span>Emails</span>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info agregar-email" title="Agregar Email">
                        <i class="fa fa-plus" style="vertical-align:middle"></i>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="emails">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
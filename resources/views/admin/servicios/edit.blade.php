

@extends('admin.adminlayout')

@section('page-header')
   <small>Actualizar</small> Servicio
@stop

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="box" style="border:1px solid #d2d6de;">
        {!! Form::model($servicio, [
                'action' => ['ServiciosController@update', $servicio->id],
                'method' => 'put',
                'files' => true
            ])
        !!}

        <div class="box-body" style="margin:10px;">
          @include('admin.servicios.form')
        </div>

      	<div class="box-footer" style="background-color:#f5f5f5;border-top:1px solid #d2d6de;">
      	  <button type="submit" class="btn btn-info" style="width:100px;">{{ trans('app.update_button') }}</button>
          <a class="btn btn-warning " href="{{ route(ADMIN.'.servicios.index') }}" style="width:100px;"><i class="fa fa-btn fa-back"></i>Cancel</a>
      	</div>

        {!! Form::close() !!}
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span>Personas</span>&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="{{ route(ADMIN . '.personas.create') }}" title="Agregar Persona">
                    <i class="fa fa-plus" style="vertical-align:middle"></i>
                </a>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>DNI</th>
                            <th>Apellidos y Nombres</th>
                            <th>Celulares</th>
                            <th>Direcciones</th>
                            <th>Emails</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personas as $persona)
                            <tr>
                                <td>{{ $persona->tipo_usuario }}</td>
                                <td>{{ $persona->documento_persona }}</td>
                                <td>{{ $persona->apellidos_persona." ".$persona->nombres_persona }}</td>
                                <td>
                                    @foreach($persona->celulares as $celular)
                                        <p>{{$celular->celular}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($persona->direcciones as $direccion)
                                        <p>{{$direccion->direccion}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($persona->emails as $email)
                                        <p>{{$email->email}}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Pagos</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $pago->pago }}</td>
                                <td>{{ $pago->ffecha_pago() }}</td>
                                <td>{{ $pago->observacion_pago }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Documentos</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tipo Documento</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documentos as $documento)
                        <tr>
                            <td>
                                {{$documento->tipo_documento['nombre']}}
                            </td>
                            <td><a href="{{ asset("storage/$documento->url_documento") }}">Descarga</a></td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Estados</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estados as $estado)
                        <tr>
                            <td>{{$estado->estado}}</td>
                            <td>{{$estado->festado()}}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

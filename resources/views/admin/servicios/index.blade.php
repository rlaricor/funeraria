@extends('admin.adminlayout')

@section('css')
  <style>
  table.table .actions {
      width: 100px;
      text-align: center;
  }
  </style>
@stop

@section('page-header')
    Servicios <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box" style="border:1px solid #d2d6de;" >

	      <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
          <a class="btn btn-info" href="{{ route(ADMIN . '.servicios.create') }}"  title="Add Item">
            <i class="fa fa-plus" style="vertical-align:middle"></i>
          </a>
	      </div>

	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding"  >
	        <table id="tbl-servicios" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Contrato</th>
                    <th>Fecha Contrato</th>
                    <th>Nombre de Difunto</th>
                    <th>DNI</th>
                    <th>Total</th>
                    <th>Deuda</th>
                    <th>Contratista</th>
                    <th>Estado</th>
                    <th>Cobro de Seguro</th>
                    <th class="no-sort"></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="actions"></th>
                </tr>
            </tfoot>
            <tbody>
      					@foreach ($items as $item)
      						<tr>
                        <td>{{ $item->n_contrato }}</td>
                        <td>{{ $item->fecha_contrato }}</td>
                        <td>{{ $item->nombres_difunto.' '.$item->apellidos_difunto }}</td>
                        <td>{{ $item->dni_difunto }}</td>
                        <td>{{ $item->total_servicio }}</td>
                        <td>{{ $item->pagado_servicio }}</td>
                        <td>{{ $item->contratista['nombre']}}
                        </td>
                        <td>Estado</td>
                        <td>{{ $item->cobro_seguro }}</td>
                        <td class="actions">
                            <ul class="list-inline" style="margin-bottom:0px;">
                                <li><a href="{{ route(ADMIN . '.servicios.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                <li>
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.servicios.destroy', $item->id),
                                        'method' => 'DELETE',
                                        ])
                                    !!}
                                    <button class="btn btn-danger btn-xs" title="{{ trans('app.delete_title') }}"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
      						</tr>
      					@endforeach
            </tbody>
          </table>
	      </div>
	      <!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	  </div>
	</div>
@stop

@section('js')
  <script>

    (function($) {

      var table = $('#tbl-servicios').DataTable({
          "columnDefs": [{
                 "targets": 'no-sort',
                 "orderable": false,
           }],
      });

    })(jQuery);
  </script>
@stop

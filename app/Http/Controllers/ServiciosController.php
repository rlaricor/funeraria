<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Contratista;
use App\Documento;
use App\Estado;
use App\LugarInscripcion;
use App\Pago;
use App\Persona;
use App\Servicio;
use App\TipoSeguro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Servicio::with('contratista')->get();
        return view('admin.servicios.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contratistas = Contratista::OrderBy('nombre','ASC')->pluck('nombre','id');
        $tipo_seguros = TipoSeguro::OrderBy('nombre','ASC')->get();
        $lugar_inscripciones = LugarInscripcion::OrderBy('nombre','ASC')->pluck('nombre','id');
        return view('admin.servicios.create', compact('contratistas','tipo_seguros','lugar_inscripciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Servicio::create([
            'tipo' => $request['tipo'],
            'user_id' => Auth::user()->id,
            'n_contrato' => $request['n_contrato'],
            'fecha_contrato' => Carbon::parse($request['fecha_contrato'])->format('Y-m-d'),
            'contratista_id' => $request['contratista_id'],
            'obs_tipo_seguro' => $request['obs_tipo_seguro'],
            'fecha_defuncion' => Carbon::parse($request['fecha_defuncion'])->format('Y-m-d'),
            'dni_difunto' => $request['dni_difunto'],
            'nombres_difunto' => $request['nombres_difunto'],
            'apellidos_difunto' => $request['apellidos_difunto'],
            'lugar_inscripcion_id' => $request['lugar_inscripcion_id'],
            'total_servicio' => $request['total_servicio'],
            'cobro_seguro' => $request['cobro_seguro'],
        ]);
        TipoSeguro::create([

        ]);*/
        $servicio = new Servicio($request->all());
        $servicio->user_id = Auth::user()->id;
        $servicio->fecha_contrato = Carbon::parse($request['fecha_contrato'])->format('Y-m-d');
        $servicio->fecha_defuncion = Carbon::parse($request['fecha_defuncion'])->format('Y-m-d');
        $servicio->save();
        $servicio->tipo_seguros()->sync($request['tipo_seguros']);
        return redirect()->route('admin.servicios.edit',$servicio->id)->with('info','Servicio creado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios = Servicio::with('contratista','lugar_inscripcion')->where('id','=', $id)->get();
        $pagos = Pago::where('servicio_id','=',$id)->orderBy('id','asc')->get();
        $personas = Servicio::find($id)->personas()->with('celulares','direcciones','emails')->get();
        $seguros = Servicio::find($id)->tipo_seguros()->get();
        $documentos = Documento::where('servicio_id','=',$id)->get();
        $estados = Estado::where('servicio_id','=',$id)->get();

        return view('admin.servicios.show',compact('servicios','pagos','personas','seguros','documentos','estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Optimizar consultas
        $servicio = Servicio::find($id);
        $contratistas = Contratista::OrderBy('nombre','ASC')->pluck('nombre','id');
        $contratista = Servicio::find($id)->contratista()->get();
        $tipo_seguros = Servicio::find($id)->tipo_seguros()->get();
        $lugar_inscripciones = LugarInscripcion::OrderBy('nombre','ASC')->pluck('nombre','id');
        $lugar_inscripcion = Servicio::find($id)->lugar_inscripcion()->get();
        $pagos = Pago::where('servicio_id','=',$id)->orderBy('id','asc')->get();
        $personas = Servicio::find($id)->personas()->with('celulares','direcciones','emails')->get();
        $seguros = Servicio::find($id)->tipo_seguros()->get();
        $documentos = Servicio::find($id)->documentos()->with('tipo_documento')->get();
        $estados = Servicio::find($id)->estados()->get();
        //var_dump($servicio);
        //foreach($documentos as $documento){
        //print $documento->tipo_documento;
        //}

        return view('admin.servicios.edit',compact('servicio', 'contratistas', 'contratista', 'tipo_seguros', 'lugar_inscripciones','lugar_inscripcion', 'pagos','personas','seguros','documentos','estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

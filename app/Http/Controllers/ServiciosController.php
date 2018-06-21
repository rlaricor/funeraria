<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contratista;
use App\Documento;
use App\Estado;
use App\LugarInscripcion;
use App\Pago;
use App\Persona;
use App\Servicio;
use App\TipoSeguro;

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
        return view('admin.servicios.create', compact('contratistas','tipo_seguros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

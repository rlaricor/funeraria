<?php

use App\Servicio;

use App\Pago;
use App\Persona;
use App\Documento;
use App\Estado;
use App\LugarInscripcion;


Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware' => ['auth']], function() {
    Route::get('/', ['uses'=>'DashboardController@index', 'as'=>'dash']);
    Route::resource('categories', 'CategoriesController')->middleware('Role:Superadmin');
    Route::resource('servicios', 'ServiciosController')->middleware('Role:Superadmin|Admin|Manager');
    Route::resource('personas', 'PersonasController')->middleware('Role:Superadmin|Admin|Manager');
    Route::resource('users', 'UsersController')->middleware('Role:Superadmin|Admin');
    Route::get('profileedit/{id}', 'ProfileController@edit');
    Route::put('profileupdate/{id}', 'ProfileController@update');
});

Route::get('lista_servicios', function () {
    $items = Servicio::with('contratista')->get();

    foreach ($items as $item) {
      print $item->contratista['nombre'];
    }
});

Route::get('servicio_id',function (){
    $id=134;
    $servicios = Servicio::with('contratista','lugar_inscripcion')->where('id','=', $id)->get();
    $pagos = Pago::where('servicio_id','=',$id)->orderBy('id','asc')->get();
    $personas = Servicio::find($id)->personas()->with('celulares','direcciones','emails')->get();
    $seguro = Servicio::find($id)->tipo_seguros()->get();
    $documentos = Documento::where('servicio_id','=',$id)->get();
    $estados = Estado::where('servicio_id','=',$id)->get();

    dd($servicios);
});
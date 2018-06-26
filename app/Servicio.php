<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Servicio extends Model
{

  protected $fillable = [
      'tipo', 'n_contrato', 'contratista_id', 'obs_tipo_seguro', 'dni_difunto', 'nombres_difunto', 'apellidos_difunto', 'lugar_inscripcion_id', 'total_servicio', 'pagado_servicio', 'cobro_seguro', 'user_id'
  ];

  protected $dates = [
      'fecha_contrato','fecha_defuncion',
  ];

  public function tipo_seguros()
  {
    return $this->belongsToMany('App\TipoSeguro','servicio_tipo_seguro');
  }

  public function contratista()
  {
    return $this->belongsTo('App\Contratista');
  }

  public function documentos()
  {
    return $this->hasMany('App\Documento');
  }

  public function estados()
  {
    return $this->hasMany('App\Estado');
  }

  public function lugar_inscripcion()
  {
    return $this->belongsTo('App\LugarInscripcion');
  }

  public function pagos()
  {
    return $this->hasMany('App\Pago');
  }

  public function personas()
  {
    return $this->belongsToMany('App\Persona','persona_servicio');
  }

  public function user(){
      return $this->belongsTo('App\User');
  }

  public function formatofechac(){
      return $this->fecha_contrato->format('d-m-Y');
  }

    public function formatofechad(){
        return $this->fecha_defuncion->format('d-m-Y');
    }
}

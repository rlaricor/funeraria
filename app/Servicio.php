<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

  protected $fillable = [
      'tipo', 'n_contrato', 'fecha_contrato', 'contratista_id', 'obs_tipo_seguro', 'fecha_defuncion', 'dni_difunto', 'nombres_difunto', 'apellidos_difunto', 'lugar_inscripcion_id', 'total_servicio', 'pagado_servicio', 'cobro_seguro', 'user_id'
  ];

  public function tipo_seguros()
  {
    return $this->belongsToMany('App\TipoSeguro','servicio_tipo_seguro');
  }

  public function contratista()
  {
    return $this->belongsTo('App\Contratista');
  }

  public function documento()
  {
    return $this->hasMany('App\Documento');
  }

  public function estado()
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
}

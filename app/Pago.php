<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $fillable = [
      'servicio_id', 'pago', 'fecha_pago', 'observacion_pago', 'user_id'
  ];

  public function servicio()
  {
       return $this->belongsTo('App\Servicio');
  }

  public function user(){
       return $this->belongsTo('App\User');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  protected $fillable = [
      'servicio_id', 'estado', 'fecha_estado'
  ];

  public function servicio()
  {
    return $this->belongsTo('App\Servicio');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LugarInscripcion extends Model
{
  protected $fillable = [
      'nombre', 'slug'
  ];

  public function servicio()
  {
    return $this->hasOne('App\Servicio');
  }
}

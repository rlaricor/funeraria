<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSeguro extends Model
{
  protected $fillable = [
      'nombre', 'slug'
  ];

  public function servicios()
  {
    return $this->belongsToMany('App\Servicio','servicio_tipo_seguro');
  }
}

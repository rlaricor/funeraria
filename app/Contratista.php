<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
  protected $fillable = [
      'nombre', 'slug',
  ];

  public function servicio()
  {
    return $this->hasMany('App\Servicio');
  }
}

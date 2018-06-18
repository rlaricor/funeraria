<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
  protected $fillable = [
      'persona_id', 'direccion'
  ];

  public function persona()
  {
    return $this->belongsTo('App\Persona');
  }
}

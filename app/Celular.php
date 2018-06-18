<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{
  protected $fillable = [
      'persona_id', 'celular'
  ];

  public function persona()
  {
    return $this->belongsTo('App\Persona');
  }
}

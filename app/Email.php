<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
  protected $fillable = [
      'persona_id', 'email'
  ];

  public function persona()
  {
    return $this->belongsTo('App\Persona');
  }
}

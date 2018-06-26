<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $fillable = [
      'servicio_id', 'estado',
  ];

  public function servicio()
  {
    return $this->belongsTo('App\Servicio');
  }

    public function festado(){
        return $this->created_at->format('d-m-Y');
    }
}

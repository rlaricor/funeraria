<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
  protected $fillable = [
      'servicio_id', 'tipo_documento_id','url_documento'
  ];

  public function servicio()
  {
    return $this->belongsTo('App\Servicio');
  }

  public function tipo_documento()
  {
    return $this->belongsTo('App\TipoDocumento');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaVOF extends Model
{
  public $table = "preguntasvof";
  public $timestamps = false;
  public $guarded = [];

  public function cuestionario() {
    return $this->belongsTo("App\Cuestionario", "cuestionario_id");
  }
}

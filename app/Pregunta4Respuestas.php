<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta4Respuestas extends Model
{
  public $table = "preguntas4respuestas";
  public $timestamps = false;
  public $guarded = [];

  public function cuestionario() {
    return $this->belongsTo("App\Cuestionario", "cuestionario_id");
  }
}

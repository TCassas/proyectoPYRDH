<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
  public $table = "cuestionarios";
  public $id = "id";
  public $timestamps = false;
  public $guarded = [];

  public function usuario() {
    return $this->belongsTo("App\User", "usuario_id");
  }

  public function categoria() {
    return $this->belongsTo("App\Categoria", "categoria_id");
  }

  public function preguntas4respuestas() {
    return $this->hasMany("App\Pregunta4Respuestas", "cuestionario_id");
  }

  public function preguntasvof() {
    return $this->hasMany("App\PreguntaVOF", "cuestionario_id");
  }
}

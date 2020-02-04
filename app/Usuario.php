<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  public $table = "usuarios";
  public $id = "id";
  public $timestamps = false;
  public $guarded = [];

  public function cuestionarios() {
    return $this->hasMany("App\Cuestionario", "usuario_id");
  }
}

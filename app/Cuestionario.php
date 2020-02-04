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
    return $this->belongsTo("App\Usuario", "usuario_id");
  }

  public function encriptarPass($pass) {
    return password_hash($pass, PASSWORD_DEFAULT);
  }
}

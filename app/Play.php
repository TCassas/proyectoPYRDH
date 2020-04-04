<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
  public $table = "plays";
  public $timestamps = false;
  public $guarded = [];

  public function cuestionario() {
    return $this->belongsTo("App\Cuestionario", "cuestionario_id");
  }

  public function usuario() {
    return $this->belongsTo("App\User", "usuario_id");
  }
}

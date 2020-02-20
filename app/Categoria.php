<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public $table = "categorias";
  public $id = "id";
  public $timestamps = false;
  public $guarded = [];

  public function cuestionarios() {
    return $this->hasMany("App\Cuestionario", "categoria_id");
  }
}

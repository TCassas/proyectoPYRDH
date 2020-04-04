<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Play;
use Auth;

class PlayController extends Controller
{
    public function addPlay(Request $req) {
      $usuarioId = Auth::user()->id;
      $play = json_decode($_POST["datos"], true);

      $idCuestionario = $play["id"];
      $tiempo = $play["tiempo"];
      $respuestas = $play["aciertos"];

      $play = New Play;
      $play->usuario_id = $usuarioId;
      $play->cuestionario_id = $idCuestionario;
      $play->tiempo = $tiempo;
      $play->respuestas = $respuestas;

      $play->save();
    }
}

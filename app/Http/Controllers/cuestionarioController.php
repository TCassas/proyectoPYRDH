<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;

class cuestionarioController extends Controller
{
    public function listar() {
      $cuestionarios = Cuestionario::all();

      return view('menuBuscarCuestionario')->with('cuestionarios', $cuestionarios);
    }
}
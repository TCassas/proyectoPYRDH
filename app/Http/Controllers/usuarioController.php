<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class usuarioController extends Controller
{
  public function info() {
    $usuarioLog = Auth::user();

    return view('infoUsuario')->with('usuario', $usuarioLog);
  }

  public function editarInfo() {
    $usuarioLog = Auth::user();

    return view('editarUsuario')->with('usuario', $usuarioLog);
  }

  public function listarCuestionarios() {
    $usuarioLog = Auth::user();

    return view('misCuestionarios')->with('usuario', $usuarioLog);
  }
}

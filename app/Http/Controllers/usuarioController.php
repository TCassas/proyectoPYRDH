<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class usuarioController extends Controller
{
  public function infoUsuario() {
    $usuarioLog = Auth::user();

    return view('infoUsuario')->with('usuario', $usuarioLog);
  }

  public function editarUsuario(Request $req) {
    $usuarioLog = Auth::user();

    dd($req->all());
    $usuario = User::find($usuarioLog->id);

  }

  public function listarCuestionarios() {
    $usuarioLog = Auth::user();

    return view('misCuestionarios')->with('usuario', $usuarioLog);
  }
}

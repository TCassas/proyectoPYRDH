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

  public function editarUsuarioFormulario() {
    $usuarioLog = Auth::user();

    $usuario = User::find($usuarioLog->id);

    return view('editarUsuario')->with('usuario', $usuarioLog);
  }

  public function buscarPerfil($id) {
    $usuarioLog = Auth::user();
    $usuario = User::find($id);

    if($usuarioLog->id == $usuario->id) {
      return view("perfilPublicoPersonal")->with('usuario', $usuario);
    } else {
      return view("perfilPublico")->with('usuario', $usuario);
    }
  }

  public function editarUsuario(Request $req) {
    $usuarioLog = Auth::user();
    $usuario = User::find($usuarioLog->id);

    if(!empty($req->file("fotoPerfil"))) {
      if($usuario->foto_perfil != "imagen predefinida") {
        unlink("storage/usuarioPerfil/$usuario->foto_perfil");
      }

      $path = $req->file("fotoPerfil")->store("public/usuarioPerfil");
      $foto_perfil = basename($path);

      $usuario->foto_perfil = $foto_perfil;
    }  else {

    }

    $usuario->name = $req["nombre"];

    $usuario->email = $req["correo"];

    $usuario->save();

    return redirect("/perfil")->with("success", "Información actualizada correctamente");
  }

  public function editarContraseniaForm() {
    $usuarioLog = Auth::user();
    $usuario = User::find($usuarioLog->id);

    return view("olvideContrasenia")->with("usuario", $usuario);
  }

  public function editarContrasenia($req) {
    $usuarioLog = Auth::user();
    $usuario = User::find($usuarioLog->id);

    if($usuario->email != $req["correo"]) {
      redirect("/perfil/passwordreset")->withErrors("Correo no valido");
    }
  }

  public function listarCuestionarios() {
    $usuarioLog = Auth::user();

    return view('misCuestionarios')->with('usuario', $usuarioLog);
  }
}

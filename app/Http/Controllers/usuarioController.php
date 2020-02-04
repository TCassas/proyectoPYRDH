<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class usuarioController extends Controller
{
  public function login(Request $req) {
    $nombre = $req["nombre"];
    $contrasenia = $req["contrasenia"];

    $usuario = Usuario::where("nombre", "=", "$nombre")->execute(); //Revisar, como comparar las contraseñas en la base de datos con la que viene por formulario

    if(password_verify($contrasenia, $usuario["contrasenia"])) {
      return redirect("/inicio");
    } else {
      return redirect("/");
    }
  }

  public function registrar(Request $req) {
    $usuario = New Usuario();
    $usuario->nombre = $req["nombre"];
    $usuario->mail = $req["mail"];
    $usuario->contrasenia = $this->$req["contrasenia"];
    $contraseniaConfirm = $req["recontrasenia"];

    $this->validate($req, [
      "nombre" => "required|string|min:6|max:12|unique:nombre",
      "mail" => "required|e-mail|unique:mail",
      "contrasenia" => "required|password|min:6|max:20",
      "recontrasenia" => "required|password|min:6|max:20|same:contrasenia"
    ]);

    $usuario->contrasenia = encriptarPass($usuario->contrasenia);

    $usuario->save();
  }
}

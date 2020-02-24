<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use Auth;

class cuestionarioController extends Controller
{
    public function listar() {
      $cuestionarios = Cuestionario::all();

      return view('menuBuscarCuestionario')->with('cuestionarios', $cuestionarios);
    }

    public function mostrarCuestionarioAEditar($id) {
      $cuestionario = Cuestionario::find($id);

      return view('editarCuestionario')->with('cuestionario', $cuestionario);
    }

    public function actualizarCuestionario(Request $req) {
      $cuestionario = New Cuestionario();
      $usuarioLog = Auth::user();

      dd($this->acondicionarReq($req->all()));

      $cuestionario->usuario_id = $usuarioLog->id;
      $cuestionario->titulo = $req["nombre"];
      if(isset($req["img"])) {
        $cuestionario->img = $req["img"];
      } else {
        $cuestionario->img = "imagen predefinida";
      }
      $cuestionario->fecha_de_creacion = Date("Y-m-d");
      $cuestionario->puntuacion = 0;
    }

    private function acondicionarReq($req) {
      $nombre = $req["nombre"];
      $desc = $req["descripcion"];
      // $genero = $req["genero"];
      // $img = $req["img"];
      $preguntas = [];
      $preguntaN = 1;

      for($i = 1; $i <= count($req) - 3; $i++) {
        if($req["tipo_".$preguntaN] == "t") {
          for($j = 1; $j <= 5; $j++) {
            switch ($j) {
              case 1:
                $preguntas["input".$preguntaN]["tipo"] = $req["tipo_".$preguntaN];
                $preguntas["input".$preguntaN]["consigna"] = $req["pregunta".$preguntaN];
                $preguntas["input".$preguntaN]["respuestas"][] = $req["respuesta".$preguntaN."_".$j];
                break;
              case 2:
              case 3:
              case 4:
                $preguntas["input".$preguntaN]["respuestas"][] = $req["respuesta".$preguntaN."_".$j];
                break;
              case 5:
                $i+=5;
                break;
            }
          }
        } elseif ($req["tipo_".$preguntaN] == "v") {
            $preguntas["input".$preguntaN]["tipo"] = $req["tipo_".$preguntaN];
            $preguntas["input".$preguntaN]["consigna"] = $req["pregunta".$preguntaN];
            $preguntas["input".$preguntaN]["respuestas"][] = $req["respuesta".$preguntaN];
            $i+=3;
          }
        $preguntaN++;
      }

      $cuestionarioFinal = [
        "nombre" => $nombre,
        "descripcion" => $desc,
        "img" => "imagen predefinida",
        // "genero" => $genero,
        "preguntas" => $preguntas
        // "autor_id" => $_SESSION["id"]
      ];

      dd($cuestionarioFinal);
    }
}

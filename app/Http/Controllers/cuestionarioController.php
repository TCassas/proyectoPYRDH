<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\Categoria;
use App\Pregunta4Respuestas;
use App\PreguntaVOF;
use Auth;

class cuestionarioController extends Controller
{
    public function inicio() {
      $cuestionarios = Cuestionario::all();
      $usuarioLog = Auth::user();

      return view('inicio')->with('cuestionarios', $cuestionarios)->with('id', $usuarioLog->id)->with('nombre', $usuarioLog->name);
    }

    public function listar() {
      $cuestionarios = Cuestionario::all();

      return view('menuBuscarCuestionario')->with('cuestionarios', $cuestionarios);
    }

    //Retorna todos los cuestionarios
    public function allCuestionarios() {
      $cuestionarios = Cuestionario::all();
      $cuestionariosAll = [];

      foreach ($cuestionarios as $cuestionario) {
        $cuestionariosAll[] = [
          "cuestionario_id" => $cuestionario->id,
          "titulo" => $cuestionario->titulo,
          "usuario_id" => $cuestionario->usuario->id,
          "usuario_nombre" => $cuestionario->usuario->name,
          "descripcion" => $cuestionario->descripcion,
          "portada" => $cuestionario->portada,
          "categoria" => $cuestionario->categoria->nombre,
          "plays" => count($cuestionario->plays)
        ];
      }

      return $cuestionariosAll;
    }

    //Busca cuestionarios por titulo o descripcion
    public function buscarCuestionario() {
      $busqueda = json_decode($_POST["cuestionarioBusqueda"], true)["termino"];
      $cuestionarios = Cuestionario::where('titulo', 'like', '%' . $busqueda . '%')->orWhere('descripcion', 'like', '%' . $busqueda . '%')->get();

      $cuestionariosAll = [];

      foreach ($cuestionarios as $cuestionario) {
        $cuestionariosAll[] = [
          "cuestionario_id" => $cuestionario->id,
          "titulo" => $cuestionario->titulo,
          "usuario_id" => $cuestionario->usuario->id,
          "usuario_nombre" => $cuestionario->usuario->name,
          "descripcion" => $cuestionario->descripcion,
          "portada" => $cuestionario->portada,
          "categoria" => $cuestionario->categoria->nombre
        ];
      }

      return json_encode($cuestionariosAll);
    }

    public function perfilCuestionarios() {
      $busqueda = json_decode($_POST["cuestionarioBusqueda"], true)["id"];
      $cuestionarios = Cuestionario::where('usuario_id', 'like',  $busqueda)->orWhere('titulo', 'like', '%' . $busqueda . '%')->orWhere('descripcion', 'like', '%' . $busqueda . '%')->get();
      $cuestionarios = Cuestionario::where('usuario_id', 'like',  $busqueda)->get();

      $cuestionariosAll = [];

      foreach ($cuestionarios as $cuestionario) {
        $cuestionariosAll[] = [
          "cuestionario_id" => $cuestionario->id,
          "titulo" => $cuestionario->titulo,
          "usuario_id" => $cuestionario->usuario->id,
          "usuario_nombre" => $cuestionario->usuario->name,
          "descripcion" => $cuestionario->descripcion,
          "portada" => $cuestionario->portada,
          "categoria" => $cuestionario->categoria->nombre
        ];
      }

      return json_encode($cuestionariosAll);
    }

  public function infoCuestionario($id) {
      $cuestionario = Cuestionario::find($id);

      if(isset($cuestionario)) {
        return view('infoCuestionario')->with('cuestionario', $cuestionario)->with('id', $id);
      } else {
        return redirect('/cuestionarios');
      }
    }

    //Retorna las preguntas de X cuestionario
    public function getPreguntas($id) {
      $cuestionario = Cuestionario::find($id);

      $preguntas[] = json_decode($cuestionario->preguntas4respuestas, true);
      $preguntas[] = json_decode($cuestionario->preguntasvof, true);

      return json_encode($preguntas);
    }

  public function jugarCuestionario($id) {
      return view('jugar');
    }

    //Esta hace lo mismo que infoCuestionario, pero las separé porque ambas envian a distintas rutas, y en las rutas cambian los links, no se me ocurrió otra forma de hacerlo xD
    public function infoPerfilCuestionario($id) {
      $cuestionario = Cuestionario::find($id);
      if(isset($cuestionario)) {
        return view('infoPerfilCuestionario')->with('cuestionario', $cuestionario);
      } else {
        return redirect('/perfil/cuestionarios');
      }
    }

    public function mostrarCuestionarioAEditar($id) {
      $cuestionario = Cuestionario::find($id);
      $categorias = Categoria::all();

      return view('editarCuestionario', compact('cuestionario', 'categorias'));
    }

    public function formularioCrearCuestionario() {
      $categorias = Categoria::all();

      return view('crearCuestionario', compact('categorias'));
    }

    public function crearCuestionario(Request $req) {
      $usuarioLog = Auth::user();
      $cuestionario = New Cuestionario;

      $cuestionarioActualizado = $this->acondicionarReq($req->all());

      if(count($cuestionarioActualizado["preguntas"]) == 0) {
        return redirect('/perfil/cuestionarios')->withErrors("No se puede crear un cuestionario sin preguntas");
      }

      $cuestionario->usuario_id = $usuarioLog->id;
      $cuestionario->titulo = $cuestionarioActualizado["titulo"];

      if(empty($cuestionarioActualizado["descripcion"])) {
        $cuestionario->descripcion = $cuestionarioActualizado["descripcion"];
      } else {
        $cuestionario->descripcion = "Sin descripción";
      }

      $cuestionario->categoria_id = $cuestionarioActualizado["categoria_id"];

      if(!empty($req->file("img"))) {
        $path = $req->file("img")->store("public/cuestionariosImgs");
        $imagenPortada = basename($path);

        $cuestionario->portada = $imagenPortada;
      } else {
        $cuestionario->portada = "imagen predefinida";
      }

      $cuestionario->save();

      foreach ($cuestionarioActualizado["preguntas"] as $pregunta) {
        if($pregunta["tipo"] === 't') {
          var_dump($pregunta);
          echo "No existe texto<br>";
          $nuevaPregunta = New Pregunta4Respuestas;
          $nuevaPregunta->cuestionario_id = $cuestionario->id;
          $nuevaPregunta->consigna = $pregunta["consigna"];
          $nuevaPregunta->respuesta_correcta = $pregunta["respuestas"][0];
          $nuevaPregunta->segunda_respuesta = $pregunta["respuestas"][1];
          $nuevaPregunta->tercera_respuesta = $pregunta["respuestas"][2];
          $nuevaPregunta->cuarta_respuesta = $pregunta["respuestas"][3];

          $nuevaPregunta->save();
        } else {
          $nuevaPregunta = New PreguntaVOF;
          $nuevaPregunta->cuestionario_id = $cuestionario->id;
          $nuevaPregunta->consigna = $pregunta["consigna"];
          $nuevaPregunta->respuesta_correcta = $pregunta["respuestas"][0];

          $nuevaPregunta->save();
        }
      }

      return redirect("/perfil/" . $usuarioLog->id);
    }

    public function actualizarCuestionario(Request $req, $id) {
      $cuestionario = Cuestionario::find($id);
      $usuarioLog = Auth::user();
      // dd($req->all());
      $cuestionarioActualizado = $this->acondicionarReq($req->all());
      // dd($cuestionarioActualizado); //Para ver como queda el array luego de ser _acondicionado_

      // dd($cuestionarioActualizado);

      //Actualizo los datos del cuestionario
      $cuestionario->usuario_id = $usuarioLog->id;
      $cuestionario->titulo = $cuestionarioActualizado["titulo"];
      $cuestionario->descripcion = $cuestionarioActualizado["descripcion"];
      $cuestionario->categoria_id = $cuestionarioActualizado["categoria_id"];

      if(count($cuestionarioActualizado["preguntas"]) != 0) {
        if(!empty($req->file("img"))) {
          unlink("storage/cuestionariosImgs/$cuestionario->portada");
          $path = $req->file("img")->store("public/cuestionariosImgs");
          $imagenPortada = basename($path);

          $cuestionario->portada = $imagenPortada;
        }  else {

        }

        foreach ($cuestionarioActualizado["preguntas"] as $pregunta) {
          if($pregunta["tipo"] === 't') {
            $nuevaPregunta = Pregunta4Respuestas::find($pregunta["id"]);

            if(isset($nuevaPregunta) && $pregunta["consigna"] === "borrar") {
              $nuevaPregunta->delete();

              continue;
            }

            if(isset($nuevaPregunta)) {
              echo "Existe texto<br>";
              $nuevaPregunta->consigna = $pregunta["consigna"];
              $nuevaPregunta->respuesta_correcta = $pregunta["respuestas"][0];
              $nuevaPregunta->segunda_respuesta = $pregunta["respuestas"][1];
              $nuevaPregunta->tercera_respuesta = $pregunta["respuestas"][2];
              $nuevaPregunta->cuarta_respuesta = $pregunta["respuestas"][3];

              $nuevaPregunta->save();
            } else {
              var_dump($pregunta);
              echo "No existe texto<br>";
              $nuevaPregunta = New Pregunta4Respuestas;
              $nuevaPregunta->cuestionario_id = $id;
              $nuevaPregunta->consigna = $pregunta["consigna"];
              $nuevaPregunta->respuesta_correcta = $pregunta["respuestas"][0];
              $nuevaPregunta->segunda_respuesta = $pregunta["respuestas"][1];
              $nuevaPregunta->tercera_respuesta = $pregunta["respuestas"][2];
              $nuevaPregunta->cuarta_respuesta = $pregunta["respuestas"][3];

              $nuevaPregunta->save();
            }
          } else {
            $nuevaPregunta = PreguntaVOF::find($pregunta["id"]);

            if(isset($nuevaPregunta) && $pregunta["consigna"] === "borrar") {
              $nuevaPregunta->delete();

              continue;
            }

            if(isset($nuevaPregunta)) {
              echo "Existe vof<br>";
              $nuevaPregunta->consigna = $pregunta["consigna"];
              $nuevaPregunta->respuesta_correcta = $pregunta["respuestas"][0];

              $nuevaPregunta->save();
            } else {
              echo "No existe vof<br>";
              $nuevaPregunta = New PreguntaVOF;
              $nuevaPregunta->cuestionario_id = $id;
              $nuevaPregunta->consigna = $pregunta["consigna"];
              $nuevaPregunta->respuesta_correcta = $pregunta["respuestas"][0];


              $nuevaPregunta->save();
            }
          }

        }

        $cuestionario->save();
      }

      return redirect("/perfil/" . $usuarioLog->id);
    }

    public function borrarCuestionario($id) {
      $cuestionario = Cuestionario::find($id);
      $usuarioLog = Auth::user();

      if($cuestionario->usuario_id === $usuarioLog->id) {
        foreach ($cuestionario->preguntas4respuestas as $pregunta) {
          $pregunta->delete();
        }

        foreach ($cuestionario->preguntasvof as $pregunta) {
          $pregunta->delete();
        }

        foreach ($cuestionario->plays as $play) {
          $play->delete();
        }

        $cuestionario->delete();

        return redirect("/perfil/".$usuarioLog->id);
      } else {
        return redirect("/inicio");
      }
    }

    private function acondicionarReq($req) {
      $cuestionario = New Cuestionario;
      $titulo = $req["nombre"];

      // dd($req);

      $categoria_id = $req["categoria"];

      if(!empty($req["img"])) {
        $portada = $req["img"];
      } else {
        $portada = "imagen predefinida";
      }

      if(!empty($req["descripcion"])) {
        $descripcion = $req["descripcion"];
      } else {
        $descripcion = "Sin descripción";
      }

      $preguntas = [];
      $preguntaN = 1;

      for($i = 1; $i <= count($req) - 6; $i++) { // Este -6 la verdad no tengo idea porque lo puse pero hace que funcione como se espera xD
        if($req["tipo_".$preguntaN] == "t") {

            for($j = 1; $j <= 5; $j++) {
              switch ($j) {
                case 1:
                  $preguntas["input".$preguntaN]["tipo"] = $req["tipo_".$preguntaN];
                  $preguntas["input".$preguntaN]["id"] = $req["pregunta_id_".$preguntaN];
                  $preguntas["input".$preguntaN]["consigna"] = $req["pregunta".$preguntaN];
                  $preguntas["input".$preguntaN]["respuestas"][] = $req["respuesta".$preguntaN."_".$j];
                  break;
                case 2:
                case 3:
                case 4:
                  $preguntas["input".$preguntaN]["respuestas"][] = $req["respuesta".$preguntaN."_".$j];
                  break;
                case 5:
                  $i+=6;
                  break;
              }
            }

        } elseif ($req["tipo_".$preguntaN] == "v") {
            if($req["pregunta".$preguntaN] === "borrar") {
              $preguntas["input".$preguntaN]["tipo"] = $req["tipo_".$preguntaN];
              $preguntas["input".$preguntaN]["id"] = $req["pregunta_id_".$preguntaN];
              $preguntas["input".$preguntaN]["consigna"] = $req["pregunta".$preguntaN];
              $preguntas["input".$preguntaN]["respuestas"][] = "1";
              $i+=4;
            } else {
              $preguntas["input".$preguntaN]["tipo"] = $req["tipo_".$preguntaN];
              $preguntas["input".$preguntaN]["id"] = $req["pregunta_id_".$preguntaN];
              $preguntas["input".$preguntaN]["consigna"] = $req["pregunta".$preguntaN];
              $preguntas["input".$preguntaN]["respuestas"][] = $req["respuesta".$preguntaN];
              $i+=3;
            }
          }

        $preguntaN++;
      }

      $cuestionarioFinal = [
        "titulo" => $titulo,
        "descripcion" => $descripcion,
        "portada" => $portada,
        "categoria_id" => $categoria_id,
        "preguntas" => $preguntas
      ];

      // dd($cuestionarioFinal);

      return $cuestionarioFinal;
    }
}

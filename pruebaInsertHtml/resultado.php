<?php
  function acondicionarCuestionario($cuestionario) {
    $cuestionarioArray = [];
    $evaluarPregunta = false;
    $auxiliar = true; // para evitar el error de que luego de la primera pasada, $i nunca es 0
    $pregunta = 1;
    $respuesta = 1;
    $i = 0;

    foreach ($_POST as $info => $valor) {
      if($valor == 't' || $evaluarPregunta) {
        switch ($i) {
          case 0:
            $auxiliar = true;
            $evaluarPregunta = true;
            $cuestionarioArray["input" . $pregunta]["tipo"] = $valor;
            break;
          case 1:
            $cuestionarioArray["input" . $pregunta]["pregunta"] = $valor;
            break;
          case 2:
          case 3:
          case 4:
            $cuestionarioArray["input" . $pregunta]["respuesta" . $respuesta] = $valor;
            $respuesta++;
            break;
          case 5:
            $cuestionarioArray["input" . $pregunta]["respuesta" . $respuesta] = $valor;
            $respuesta++;
            $i = 0;
            $respuesta = 1;
            $pregunta++;
            $auxiliar = false;
            break;
        }

        if($auxiliar) {
          $i++;
        }

        $auxiliar = true;
       }
    }

    return $cuestionarioArray;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <section style="display: flex; justify-content: space-around; width: 100%">
    <article class="">
      <p style="font-size: 1.7em;"><strong>$_POST</strong></p>
      <pre><?php var_export($_POST);?></pre>
    </article>
    <article class="">
      <p style="font-size: 1.7em;"><strong>Array final</strong></p>
      <pre><?php var_export(acondicionarCuestionario($_POST));?></pre>
    </article>
  </section>
</body>
</html>























<?php
//   if($i == 0) {
  //     $evaluarPregunta = true;
  //     continue;
  //     $i++;
  //   }
  //
  //   if($i == 1) {
    //     $cuestionarioArray["pregunta" . $i] = $valor;
    //     $i++;
    //   }
    //
    //   if($i < 6) {
      //     // $cuestionarioArray["Respuestas" . $i][] = $valor;
      //     $pregunta++;
      //     $i++;
      //   }
      //
      //   if($i == 6) {
        //     $i = 0;
        //     $pregunta = 0;
        //     $evaluarPregunta = false;
        //   }
?>

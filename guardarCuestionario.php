<?php
  require("pdo.php");
  require("Usuario.php");
  session_start();

  //Tuve que hacer esto porque al hacer bindValue, todos los datos aparecían como strings y me saltaba error cuando la base de datos esperaba un int, por ejemplo
  //Y como verá, hago lo mismo con las preguntas

  $fecha = Date('Y-m-d');
  $cantidad = count($cuestionarioFinal['preguntas']);
  $id = $_SESSION['id'];
  $nombre = $cuestionarioFinal['nombre'];
  $genero = $cuestionarioFinal['genero'];
  $img = $cuestionarioFinal['img'];

  //Inserto el nuevo cuestionario en la base de datos
  $query = $db->prepare("INSERT INTO cuestionarios VALUES (default, $id, $genero, '$nombre', '$img', '$fecha', 0, $cantidad)");
  $query->execute();

  //Quizá esta no es la mejor forma, pero no imaginé otro medio para obtener el id del formulario recién creado, asi que lo busco xD
  $query2 = $db->prepare("SELECT id FROM cuestionarios WHERE usuario_id = $id AND categoria_id = $genero AND titulo = '$nombre' AND fecha_de_creacion = '$fecha'");
  $query2->execute();
  $result = $query2->fetch(PDO::FETCH_ASSOC);


  forEach($cuestionarioFinal["preguntas"] as $pregunta) {
    if($pregunta["tipo"] == 't') {
      $id = $result['id'];
      $consigna = $pregunta["consigna"];
      $respuesta1 = $pregunta['respuestas'][0];
      $respuesta2 = $pregunta['respuestas'][1];
      $respuesta3 = $pregunta['respuestas'][2];
      $respuesta4 = $pregunta['respuestas'][3];

      $query3 = $db->prepare("INSERT INTO preguntas4respuestas VALUES(default, $id, '$consigna', '$respuesta1', '$respuesta2', '$respuesta3', '$respuesta4')");
      $query3->execute();
    } elseif ($pregunta["tipo"] == 'v') {
      $id = $result['id'];
      $consigna = $pregunta["consigna"];
      $respuesta1 = $pregunta['respuestas'][0];

      $query3 = $db->prepare("INSERT INTO preguntasvof VALUES(default, $id, '$consigna', '$respuesta1')");
      $query3->execute();
    }
  }

  header("Location: misCuestionarios");

  exit;
?>

<?php
  require("pdo.php");

  session_start();

  $id = $_GET["id"];

  //al menos lo intenté
  // $query = $db->prepare("DELETE FROM cuestionarios
  //                        INNER JOIN preguntas4respuestas ON cuestionarios.id = preguntas4respuestas.cuestionario_id
  //                        INNER JOIN preguntasvof ON cuestionarios.id = preguntasvof.cuestionario_id
  //                        WHERE id = $id");
  $query->execute();

  header("Location: misCuestionarios.php");

?>

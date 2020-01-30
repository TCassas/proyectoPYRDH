<?php
  $nombre = $_POST["nombre"];
  $desc = $_POST["descripcion"];
  $genero = $_POST["genero"];
  // $img = $_POST["img"];
  $preguntas = [];
  $preguntaN = 1;

  for($i = 1; $i <= count($_POST) - 3; $i++) {
    if($_POST["tipo_".$preguntaN] == "t") {
      for($j = 1; $j <= 5; $j++) {
        switch ($j) {
          case 1:
            $preguntas["input".$preguntaN]["tipo"] = $_POST["tipo_".$preguntaN];
            $preguntas["input".$preguntaN]["consigna"] = $_POST["pregunta".$preguntaN];
            $preguntas["input".$preguntaN]["respuestas"][] = $_POST["respuesta".$preguntaN."_".$j];
            break;
          case 2:
          case 3:
          case 4:
            $preguntas["input".$preguntaN]["respuestas"][] = $_POST["respuesta".$preguntaN."_".$j];
            break;
          case 5:
            $i+=5;
            break;
        }
      }
    } elseif ($_POST["tipo_".$preguntaN] == "v") {
        $preguntas["input".$preguntaN]["tipo"] = $_POST["tipo_".$preguntaN];
        $preguntas["input".$preguntaN]["consigna"] = $_POST["pregunta".$preguntaN];
        $preguntas["input".$preguntaN]["respuestas"][] = $_POST["respuesta".$preguntaN];
        $i+=3;
      }
    $preguntaN++;
  }

  $cuestionarioFinal = [
    "nombre" => $nombre,
    "descripcion" => $desc,
    "img" => "imagen predefinida",
    "genero" => $genero,
    "preguntas" => $preguntas
    // "autor_id" => $_SESSION["id"]
  ];

  require("guardarCuestionario.php");
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
      <pre><?php var_dump($_POST);?></pre>
    </article>
    <article class="">
      <p style="font-size: 1.7em;"><strong>Array final</strong></p>
      <pre><?php var_dump($cuestionarioFinal);?></pre>
    </article>
  </section>
</body>
</html>

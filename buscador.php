<?php
  require("pdo.php");

  session_start();

  $id = $_SESSION["id"];

  $busqueda = $_GET["cuestionarioBusqueda"];

  $query = $db->prepare("SELECT usuarios.nombre as 'username', categorias.nombre as 'categoria', cuestionarios.titulo as 'titulo', cuestionarios.cantidad_preguntas as 'cantidad de preguntas'
                         FROM cuestionarios
                         INNER JOIN usuarios ON usuario_id = usuarios.id
                         INNER JOIN categorias ON categoria_id = categorias.id
                         WHERE cuestionarios.titulo LIKE '%$busqueda%'");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>¡Elegí que cuestionario jugar!</title>
</head>
<body background="imgs/bg-body.png">
  <main id="mainBuscarCuestionario">
    <section id="menuBuscarCuestionario">
      <div>

        <a href="infoUsuario.php" class="botonMenu">
          <ion-icon name="contact"></ion-icon> Usuario
        </a>

        <!-- nombre de usuario -->

        <a href="formularioPlay.php" class="botonMenu">
          <ion-icon name="home"></ion-icon> Inicio
        </a>

      </div>
    </section>
    <section id="cuestionariosLista">

      <!-- Input busqueda de cuestionarnios -->
      <div class="unasRespuestas" id="inputBuscarCuestionario">
        <form class="" action="buscador.php" method="GET">
          <input type="text" name="cuestionarioBusqueda" value="" placeholder="Buscar">
          <button type="submit" name="button">Buscar</button>
        </form>
      </div>

      <!-- Lista de cuestionarios -->
      <div class="cuestionarios">
        <?php forEach($result as $cuestionario) { ?>

          <article class="articuloCuestionario">
            <div class="infoCuestionario">
              <div class="fotoCuestionario">

              </div>
              <div class="infoLista">
                <h4><?= $cuestionario["titulo"] ?></h4>
                <p><?= $cuestionario["cantidad de preguntas"] ?> preguntas</p>
              </div>
            </div>
            <div class="creadorCuestionario">
              <p class="creador">Autor: <?= $cuestionario["username"] ?></p>
              <a href="ranking.php" class="ranking">Ranking<ion-icon name="list"></ion-icon></a>
              <p> Genero: <?= $cuestionario["categoria"] ?></p>
            </div>
            <div class="jugarCuestionario">
              <a href="preguntaTexto.php">
                <ion-icon name="play-circle"></ion-icon>
              </a>
            </div>
          </article>

        <?php }
      ?>
      </div>

    </section>
  </main>
</body>
</html>

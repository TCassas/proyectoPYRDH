<?php
  require("pdo.php");

  session_start();

  $id = $_SESSION["id"];

  $query = $db->prepare("SELECT cuestionarios.id as id, usuarios.nombre as 'username', categorias.nombre as 'categoria', cuestionarios.titulo as 'titulo', cuestionarios.cantidad_preguntas as 'cantidad de preguntas'
                         FROM cuestionarios
                         INNER JOIN usuarios ON usuario_id = usuarios.id
                         INNER JOIN categorias ON categoria_id = categorias.id
                         WHERE cuestionarios.usuario_id = $id");
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
  <title>Mis cuestionarios</title>
</head>
<body background="imgs/bg-body.png">
  <main id="mainBuscarCuestionario">
    <section id="menuBuscarCuestionario">
      <div>
        <a href="infoUsuario.php" class="botonMenu">
          <ion-icon name="contact"></ion-icon>
          <p>Usuario</p>
        </a>

        <!-- nombre de usuario -->

        <a href="formularioPlay.php" class="botonMenu">
          <ion-icon name="home"></ion-icon> Inicio
        </a>

        <a href="formularioNuevoCuestionario.php" class="botonMenu">
          <ion-icon name="add"></ion-icon> Crear
        </a>

      </div>
    </section>
    <section id="cuestionariosLista">

      <!-- Input busqueda de cuestionarnios -->
      <div id="inputBuscarCuestionario" class="unasRespuestas">
        <input type="text" name="cuestionarioBusqueda" value="" placeholder="Buscar">
      </div>
      <h1>Mis cuestionarios (<?= count($result) ?>) </h1>
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
                <a href="editarCuestionario.php">
                  <ion-icon name="create"></ion-icon>
                </a>
                <a href="borrarCuestionario.php?id=<?= $cuestionario["id"] ?>">
                  <ion-icon name="trash"></ion-icon>
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

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
<body>
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

        <a href="menuBuscarCuestionario.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>

      </div>
    </section>
    <section id="cuestionariosLista">
      <div class="cuestionarioRanking">
        <?php
          include("temporales/articuloListaCuestionario.php");
        ?>
      </div>
      <h1 class="tituloRanking">Ranking</h1>
      <table>
        <tr>
          <th>Posición</th>
          <th>Usuario</th>
          <th>Errores</th>
          <th>Tiempo</th>
          <th>Puntaje</th>
        </tr>
        <?php
          for ($i = 0; $i < 20; $i++) {
            $puntaje = rand(100, 400);
            $tiempoSegundos = rand(00, 60);
            $tiempoMinutos = rand(1, 30);
            $errores = rand(0,3);
            if($i % 2 == 0) {
            ?>
            <tr>
              <td><?="#" . ($i + 1)?></td>
              <td>Usuario</td>
              <td><?=$errores?></td>
              <td><?=$tiempoMinutos . ":" . $tiempoSegundos?></td>
              <td><?=$puntaje?></td>
            </tr>
          <?php } else { ?>
            <tr>
              <td class="lineaPar"><?="#" . ($i + 1)?></td>
              <td class="lineaPar">Usuario</td>
              <td class="lineaPar"><?=$errores?></td>
              <td class="lineaPar"><?=$tiempoMinutos . ":" . $tiempoSegundos?></td>
              <td class="lineaPar"><?=$puntaje?></td>
            </tr>
          <?php }
          }
        ?>
      </table>
      <a href="menuBuscarCuestionario.php" id="botonRegresar">Regresar</a>
    </section>
  </main>
</body>
</html>

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
      <div id="inputBuscarCuestionario" class="unasRespuestas">
        <input type="text" name="cuestionarioBusqueda" value="" placeholder="Buscar">
      </div>

      <!-- Lista de cuestionarios -->
      <div class="cuestionarios">
        <?php for ($i = 0; $i < 10; $i++) {
          include("temporales/articuloListaCuestionario.php");
        }?>
      </div>

    </section>
  </main>
</body>
</html>

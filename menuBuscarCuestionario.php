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

        <button id="botonUsuario">
          <ion-icon name="contact"></ion-icon>
        </button>

        <!-- nombre de usuario -->
        <p>Usuario</p>

        <button id="botonHome">
          Inicio <ion-icon name="home"></ion-icon>
        </button>

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

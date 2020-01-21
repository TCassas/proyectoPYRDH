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
  <title>Crea tu cuestionario</title>
</head>
<body>
  <main id="mainNuevoFormulario">
    <header id="headerNuevoCuestionarioFormulario">

      <div id="nombreNuevoCuestionario">
        <!-- Aqui tendría que venir por defecto "cuestionario #" y el numero sería el count(cuestionarios) del usuario -->
        <input type="text" name="nombreCuestionario" value="Cuestionario #1" placeholder="Titulo">
      </div>

      <div id="botonesMenu">
        <!-- <a href="formularioPlay.php" class="botonMenu">
          <ion-icon name="contact"></ion-icon>
          <p>Usuario</p>
        </a> -->
        <a href="misCuestionarios.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
      </div>

    </header>
    <section id="formularioNuevoCuestionario">
      <form id="formularioNC" action="formularioNuevoCuestionario.php" method="post">
        <div id="preguntasYRespuestas">

        </div>
        <div id="botonesCuestionario">
          <button id="inputTexto" type="button">Agregar pregunta de texto</button>
          <button id="inputVOF" type="button">Agregar pregunta de verdadero o falso</button>
        </div>
        <button type="submit" name="button" id="botonEnviarFormulario">¡Crear formulario!</button>
      </form>
    </section>
  </main>

  <script src="js/creacionDeCuestionarios.js"></script>
</body>
</html>

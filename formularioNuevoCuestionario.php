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
        <button id="botonVolver">
          <ion-icon name="arrow-round-back"></ion-icon>
        </button>
        <button id="botonUsuario">
          <ion-icon name="contact"></ion-icon>
        </button>
      </div>

    </header>
    <section id="formularioNuevoCuestionario">
      <form id="formularioNC" action="formularioNuevoCuestionario.php" method="post">
        <div class="preguntasYRespuestas">
          <!-- Pregunta tipo 4 respuestas -->
          <?php for ($i = 0; $i < 5; $i++) {
            include("temporales/preguntaTipoTexto.php");
          }?>

          <!-- Pregunta tipo numerica -->
          <?php
            include("temporales/preguntaTipoNumerico.php");
          ?>

          <!-- Pregunta tipo verdadero o falso -->
          <?php
            include("temporales/preguntaTipoVerdaderOFalso.php");
          ?>

        </div>
        <button type="submit" name="button" id="botonEnviarFormulario">¡Crear formulario!</button>
      </form>
    </section>
  </main>
</body>
</html>

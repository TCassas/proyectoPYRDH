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
  <title>Modifica tu cuestionario</title>
</head>
<body>
  <main id="mainPaginaAyuda">
    <section id="cartaPaginaAyuda">
      <a href="formularioPlay.php" class="botonMenu">
        <ion-icon name="arrow-round-back"></ion-icon> Regresar
      </a>
      <section id="nosotros">
        <p class="titulo">Nosotros</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tincidunt iaculis purus. In rhoncus ligula neque, blandit tempor erat aliquet pretium. Nam mauris mi, consectetur at eleifend non, posuere at dui. In ut posuere orci. Proin imperdiet sem at metus tincidunt aliquam. Cras vel ex eget risus pharetra aliquet sed in est. Integer placerat, sapien eget tristique hendrerit, ipsum erat viverra felis, a mollis eros quam nec metus. Suspendisse ut fringilla velit. Morbi eu augue sed odio placerat varius. Sed efficitur nisl elit, in volutpat nunc ultricies nec. Nunc ex felis, dictum id leo vel, eleifend bibendum nulla.</p>
      </section>
      <hr>
      <section id="preguntasFrecuentes">
        <p class="titulo">Preguntas frecuentes</p>
        <div id="preguntasPaginaAyuda">
          <?php
            for ($i = 0; $i < 4; $i++) {
              ?>
              <div class="preguntaYRespuestaPaginaAyuda">
                <p class="preguntaPaginaAyuda">Pregunta <?=$i + 1?></p>
                <p class="respuestaPaginaAyuda">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tincidunt iaculis purus. In rhoncus ligula neque, blandit tempor erat aliquet pretium. Nam mauris mi, consectetur at eleifend non, posuere at dui. In ut posuere orci. Proin imperdiet sem at metus tincidunt aliquam. Cras vel ex eget risus pharetra aliquet sed in est. Integer placerat, sapien eget tristique hendrerit, ipsum erat viverra felis, a mollis eros quam nec metus. Suspendisse ut fringilla velit. Morbi eu augue sed odio placerat varius. Sed efficitur nisl elit, in volutpat nunc ultricies nec. Nunc ex felis, dictum id leo vel, eleifend bibendum nulla.</p>
              </div>
              <?php
            }
          ?>
        </div>
      </section>
      <hr>
      <section id="contacto">
        <p class="titulo">¡Contactanos!</p>
        <form class="" action="contacto.php" method="post">
          <div class="grupoLIY">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="">
          </div>
          <div class="grupoLIY">
            <label for="correo">Correo electronico: </label>
            <input type="mail" name="correo" id="correo" value="">
          </div>
          <div class="grupoLIY">
            <label for="mensaje">Mensaje: </label>
            <textarea name="mensaje" id="mensaje" rows="8" cols="80"></textarea>
          </div>
          <button type="submit" name="button" id="botonEnviarFormularioContacto">Enviar</button>
        </form>
      </section>
    </section>
  </main>
</body>
</html>

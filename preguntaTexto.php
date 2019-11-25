<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>¡A jugar!</title>
</head>
<body>
  <main id="mainPreguntaTexto">
    <section id="seccionIzquierdaPreguntaTexto">
      <div class="cronometro">
        <p>60 seg</p>
      </div>
      <div class="preguntaTexto">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus assumenda, doloremque error velit magni a veniam, beatae fugit laborum mollitia?</p>
      </div>
      <div class="contadorErrores">
        <div class="errorCruz">
          <ion-icon name="close-circle"></ion-icon>
        </div>
        <div class="errorCruz">
          <ion-icon name="close-circle"></ion-icon>
        </div>
        <div class="errorCruz">
          <ion-icon name="close-circle"></ion-icon>
        </div>
      </div>
      <div class="comodinesPreguntaTexto">
        <div>
          <h5>Comodines</h5>
        </div>
        <div class="seccionComodines">
          <button class="comodin1">
            <ion-icon name="pie"></ion-icon>
          </button>
          <button class="comodin2">
            <ion-icon name="people"></ion-icon>
          </button>
          <button class="comodin3">
            <ion-icon name="bulb"></ion-icon>
          </button>
        </div>
      </div>
    </section>
    <section id="seccionDerechaPreguntaTexto">
      <article class="respuestaOpcion">
        <p>Respuesta 1</p>
      </article>
      <article class="respuestaOpcion">
        <p>Respuesta 2</p>
      </article>
      <article class="respuestaOpcion">
        <p>Respuesta 3</p>
      </article>
      <article class="respuestaOpcion">
        <p>Respuesta 4</p>
      </article>
    </section>
  </main>
</body>
</html>

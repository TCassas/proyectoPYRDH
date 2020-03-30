<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <title>¡A jugar!</title>
</head>
<body>
  <main id="mainPreguntaTexto">
    <a href="#seccionDerechaPreguntaTexto" id="irARespuestas"><ion-icon name="arrow-round-down"></ion-icon></a>
    <section id="seccionIzquierdaPreguntaTexto">
      <div class="cronometro">
        <p>25 seg</p>
      </div>
      <div class="preguntaTexto">
        <p id="pregunta"></p>
      </div>
      <div class="contadorErrores">
        <div class="errorCruz">
          <ion-icon name="checkmark-circle"></ion-icon>
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
      <div id="preguntas">

      </div>

      <a href="#seccionIzquierdaPreguntaTexto" id="irAPregunta"><ion-icon name="arrow-round-up"></ion-icon></a>
      <section id="cantidadPreguntas">

      </section>
      <button type="button" name="button"  id="responder">Enviar</button>
    </section>
  </main>
  <script src="{{asset('js/jugar.js')}}" charset="utf-8"></script>
</body>
</html>

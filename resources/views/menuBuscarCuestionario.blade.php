<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <title>¡Elegí que cuestionario jugar!</title>
</head>
<body background="/storage/bg-body.png">
  <main id="mainBuscarCuestionario">
    <section id="menuBuscarCuestionario">
      <div>

        <a href="/perfil" class="botonMenu">
          <ion-icon name="contact"></ion-icon> Usuario
        </a>

        <!-- nombre de usuario -->

        <a href="/inicio" class="botonMenu">
          <ion-icon name="home"></ion-icon> Inicio
        </a>

      </div>
    </section>
    <section id="cuestionariosLista">

      <!-- Input busqueda de cuestionarnios -->
      <div class="unasRespuestas" id="inputBuscarCuestionario">
        <form class="" action="/cuestionarios/buscar" method="GET">
          {{csrf_field()}}
          <input type="text" name="cuestionarioBusqueda" value="" placeholder="Buscar">
          <button type="submit" name="button">Buscar</button>
        </form>
      </div>

      <!-- Lista de cuestionarios -->
      <div class="cuestionarios">
        @foreach ($cuestionarios as $cuestionario)
          <article class="articuloCuestionario">
            <div class="infoCuestionario">
              <div class="portadaCuestionario">
                @if ($cuestionario->portada != "imagen predefinida")
                  <img src="/storage/cuestionariosImgs/{{$cuestionario->portada}}" alt="">
                @else
                  <img src="/imgs/fondoPunteado.jpg" alt="">
                @endif
              </div>
              <div class="infoLista">
                <h4><a href="/cuestionarios/{{$cuestionario->id}}">
                  @if (strlen($cuestionario->titulo) < 16)
                    {{$cuestionario->titulo}}
                  @else
                    {{substr($cuestionario->titulo, 0, 14)}} ...
                  @endif
                </a></h4>
                <p> Preguntas: {{count($cuestionario->preguntasvof) + count($cuestionario->preguntas4respuestas)}} </p>
              </div>
            </div>
            <div class="creadorCuestionario">
              <p class="creador">Autor: {{$cuestionario->usuario->name}}</p>
              <a href="/ranking" class="ranking">Ranking<ion-icon name="list"></ion-icon></a>
              <p> Categoria: <span id="categoria">{{$cuestionario->categoria->nombre}}</span></p>
            </div>
            <div class="jugarCuestionario">
              <a href="preguntaTexto.php">
                <ion-icon name="play-circle"></ion-icon>
              </a>
            </div>
          </article>
        @endforeach
      </div>
    </section>
  </main>
</body>
</html>

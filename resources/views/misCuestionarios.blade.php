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
  <title>Mis cuestionarios</title>
</head>
<body background="/storage/bg-body.png">
  <main id="mainBuscarCuestionario">
    <section id="menuBuscarCuestionario">
      <div>
        <a href="/perfil" class="botonMenu">
          <ion-icon name="contact"></ion-icon>
          <p>Usuario</p>
        </a>

        <!-- nombre de usuario -->

        <a href="/inicio" class="botonMenu">
          <ion-icon name="home"></ion-icon> Inicio
        </a>

        <a href="/cuestionarios/crear" class="botonMenu">
          <ion-icon name="add"></ion-icon> Crear
        </a>

      </div>
    </section>
    <section id="cuestionariosLista">

      <!-- Input busqueda de cuestionarnios -->
      <div class="unasRespuestas" id="inputBuscarCuestionario">
        <form class="" action="/cuestionarios/buscar" method="GET">
          <input type="text" name="cuestionarioBusqueda" value="" placeholder="Buscar">
          <button type="submit" name="button">Buscar</button>
        </form>
      </div>
      <h1>Mis cuestionarios ({{count($usuario->cuestionarios)}}) </h1>
      <!-- Lista de cuestionarios -->
      <div class="cuestionarios">
        @foreach ($usuario->cuestionarios as $cuestionario)
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
                <h4>{{$cuestionario->titulo}}</h4>
                <p>{{count($cuestionario->preguntasvof) + count($cuestionario->preguntas4respuestas)}} preguntas</p>
              </div>
            </div>
            <div class="creadorCuestionario">
              <p class="creador">Autor: {{$usuario->name}}</p>
              <a href="/ranking/{{$cuestionario->id}}" class="ranking">Ranking<ion-icon name="list"></ion-icon></a>
              <p> Genero: {{$cuestionario->categoria->nombre}}</p>
            </div>
            <div class="jugarCuestionario">
              <a href="/cuestionarios/editar/{{$cuestionario->id}}">
                <ion-icon name="create"></ion-icon>
              </a>
              <form class="" action="/cuestionarios/borrar/{{$cuestionario->id}}" method="post">
                {{csrf_field()}}
                <button type="submit" class="borrarCuestionario">
                  <ion-icon name="trash"></ion-icon>
                </button>
                <input type="hidden" name="_method" value="delete">
              </form>
            </div>
          </article>
        @endforeach
      </div>
    </section>

    <script src="{{asset('js/borrarCuestionario.js')}}" charset="utf-8"></script>
  </main>
</body>
</html>

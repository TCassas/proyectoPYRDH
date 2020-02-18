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
<body background="imgs/bg-body.png">
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
        <form class="" action="buscador.php" method="GET">
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
              <div class="fotoCuestionario">

              </div>
              <div class="infoLista">
                <h4>{{$cuestionario->titulo}}</h4>
                <p>{{$cuestionario->preguntas}} preguntas</p>
              </div>
            </div>
            <div class="creadorCuestionario">
              <p class="creador">Autor: {{$usuario->name}}</p>
              <a href="/ranking/{{$cuestionario->id}}" class="ranking">Ranking<ion-icon name="list"></ion-icon></a>
              <p> Genero: </p>
            </div>
            <div class="jugarCuestionario">
              <a href="/cuestionarios/editar/{{$cuestionario->id}}">
                <ion-icon name="create"></ion-icon>
              </a>
              <a href="/cuestionarios/borrar/{{$cuestionario->id}}">
                <ion-icon name="trash"></ion-icon>
              </a>
            </div>
          </article>
        @endforeach
      </div>
    </section>
  </main>
</body>
</html>

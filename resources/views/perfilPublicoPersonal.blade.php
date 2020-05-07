<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/perfilPublico.js')}}" charset="utf-8"></script>
    <title>Document</title>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
  <main id="index-main">
    <section id="menu">
      <div class="menu-boton">
        <ion-icon name="menu"></ion-icon>
        <h2>Idionisio</h2>
        <ion-icon name="contact"></ion-icon>
        <div id="menu-links">
          <a href="/inicio">Inicio</a>
          <a href="/perfil/{{$usuario->id}}">Mi perfil</a>
          <a href="/cuestionarios/crear">Crear cuestionario</a>
          <a href="/logout">Cerrar sesión</a>
        </div>
      </div>
    </section>
    <main id="main-perfil_publico">
      <section id="usuario-perfil_publico">
        <h1>{{$usuario->name}}</h1>
        <div id="imagen-perfil_publico"
        @if ($usuario->foto_perfil != "imagen predefinida")
          style="background-image: url('/storage/usuarioPerfil/{{$usuario->foto_perfil}}'); background-size: cover;">
        @else
          style="background-image: url('/imgs/fondoPunteado.jpg');">
        @endif
      </div>
      <a href="/perfil/editar" class="botonMenu">Modificar información</a>
    </section>
    <section id="cuestionarios-perfil_publico">
      <h4>Cuestionarios creados:</h4>
      @if (count($usuario->cuestionarios) == 0)
        <h4>Este usuario no ha creado cuestionarios aún :(</h4>
      @else
        @foreach ($usuario->cuestionarios as $cuestionario)
          <article class="cuestionario">
            <div class="cuestionario-info">
              <h4 class="">{{$cuestionario->titulo}}</h4>
              <p class="">By: <a href="#">{{$cuestionario->usuario->name}}</a></p>
              <p class="descripcion">Descripción: <span>{{$cuestionario->descripcion}}</span></p>
              <div class="cuestionario-info_jugable">
                <p><ion-icon name="play-circle"></ion-icon>{{count($cuestionario->plays)}}</p>
                <a href="/cuestionarios/editar/{{$cuestionario->id}}" style="margin-right: 10px;">Editar</a>
                <form class="" action="/cuestionarios/borrar/{{$cuestionario->id}}" method="post">
                  {{csrf_field()}}
                  <button type="submit" id="botonBorrar">
                    Borrar
                  </button>
                  <input type="hidden" name="_method" value="delete">
                </form>
              </div>
            </div>
            <div class="cuestionario-actions">
              <div class="cuestionario-imagen"
                @if ($cuestionario->portada != 'imagen predefinida')
                  style="background-image: url('/storage/cuestionariosImgs/{{$cuestionario->portada}}'); background-size: cover;">
                @else
                  style="background-image: url('/imgs/fondoPunteado.jpg');">
                @endif

              </div>
              <a href="/cuestionarios/jugar/{{$cuestionario->id}}">JUGAR<ion-icon name="play-circle"></ion-icon></a>
            </div>
          </article>
        @endforeach
      @endif
    </section>
  </main>
</body>
</html>

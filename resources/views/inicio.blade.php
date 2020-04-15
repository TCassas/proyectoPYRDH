<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/menu.js')}}" charset="utf-8"></script>
    <title>Document</title>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
          <a href="/perfil">Mi perfil</a>
          <a href="/cuestionarios/crear">Crear cuestionario</a>
          <a href="/logout">Cerrar sesión</a>
        </div>
      </div>
    </section>
    <div class="">
      <h1>¡Bienvenido!</h1>
    </div>
    <section id="index-buscador">
      <form class="" action="/api/cuestionarios/buscar" method="post">
        {{csrf_field()}}
        <label for="cuestionarioBusqueda">Buscar</label>
        <input type="text" name="cuestionarioBusqueda" value="" placeholder="Nombre / genero / descripción" id="cuestionarioBusqueda">
        <button type="button" name="button" id="botonBuscar">
          Buscar
        </button>
      </form>
    </section>
    <section id="index-resultados_container">
      <p>Resultados: </p>
      <section id="index-resultados">
        <div id="columnaIzquierdaCuestionarios">

        </div>
        <div id="columnaDerechaCuestionarios">

        </div>
      </section>
    </section>
  </main>
</body>
</html>

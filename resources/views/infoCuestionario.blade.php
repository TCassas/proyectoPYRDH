<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/infoCuestionario.js')}}" charset="utf-8"></script>
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
          <a href="/perfil">Mi perfil</a>
          <a href="/cuestionarios/crear">Crear cuestionario</a>
          <a href="/logout">Cerrar sesión</a>
        </div>
      </div>
    </section>
    <div class="">
      <h1>Ranking</h1>
    </div>
    <section id="index-resultados_container">
      <article class="cuestionario">
        <div class="cuestionario-info">
          <h4>{{$cuestionario->titulo}}</h4>
          <p>By: <a href="#">{{$cuestionario->usuario->name}}</a></p>
          <p class="descripcion">Descripción: <span>{{$cuestionario->descripcion}}</span></p>
          <div class="cuestionario-info_jugable">
            <p><ion-icon name="play-circle"></ion-icon> 100</p>
            <p><ion-icon name="heart"></ion-icon> 100</p>
          </div>
        </div>
        <div class="cuestionario-actions">
          <div class="cuestionario-imagen" style="background-image: url(${portada}); background-size: cover;">

          </div>
          <a href="/cuestionarios/jugar/${cuestionario.cuestionario_id}">JUGAR<ion-icon name="play-circle"></ion-icon></a>
        </div>
      </article>
      <p>Resultados: </p>

        <table>
          <tr>
            <th>Posición</th>
            <th>Usuario</th>
            <th>Errores</th>
            <th>Tiempo</th>
            <th>Puntaje</th>
          </tr>
          <?php
            for ($i = 0; $i < 20; $i++) {
              $puntaje = rand(100, 400);
              $tiempoSegundos = rand(00, 60);
              $tiempoMinutos = rand(1, 30);
              $errores = rand(0,3);
              if($i % 2 == 0) {
              ?>
              <tr>
                <td><?="#" . ($i + 1)?></td>
                <td>Usuario</td>
                <td><?=$errores?></td>
                <td><?=$tiempoMinutos . ":" . $tiempoSegundos?></td>
                <td><?=$puntaje?></td>
              </tr>
            <?php } else { ?>
              <tr>
                <td class="lineaPar"><?="#" . ($i + 1)?></td>
                <td class="lineaPar">Usuario</td>
                <td class="lineaPar"><?=$errores?></td>
                <td class="lineaPar"><?=$tiempoMinutos . ":" . $tiempoSegundos?></td>
                <td class="lineaPar"><?=$puntaje?></td>
              </tr>
            <?php }
            }
          ?>
        </table>
      </section>
    </section>
  </main>
</body>
</html>

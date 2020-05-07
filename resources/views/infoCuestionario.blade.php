<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/ranking.js')}}" charset="utf-8"></script>
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
          <a href="/perfil/{{$id}}">Mi perfil</a>
          <a href="/cuestionarios/crear">Crear cuestionario</a>
          <a href="/logout">Cerrar sesión</a>
        </div>
      </div>
    </section>
    <div class="">
      <h1>Ranking</h1>
    </div>
    <section id="index-resultados_container">
      <article class="cuestionario cuestionario-desplegado">
        <div class="cuestionario-info cuestionario-info_desplegada">
          <h4 class="marginh4">{{$cuestionario->titulo}}</h4>
          <p class="marginAutor">By: <a href="#">{{$cuestionario->usuario->name}}</a></p>
          <p class="descripcion descripcion-desplegada">Descripción: <span>{{$cuestionario->descripcion}}</span></p>
          <div class="cuestionario-info_jugable cuestionario-info_jugable-desplegada">
            <p><ion-icon name="play-circle"></ion-icon> {{count($cuestionario->plays)}}</p>
          </div>
        </div>
        <div class="cuestionario-actions">
          <div class="cuestionario-imagen cuestionario-imagen_desplegada"
            @if ($cuestionario->portada != 'imagen predefinida')
              style="background-image: url('/storage/cuestionariosImgs/{{$cuestionario->portada}}'); background-size: cover;">
            @else
              style="background-image: url('/imgs/fondoPunteado.jpg');">
            @endif

          </div>
          <a href="/cuestionarios/jugar/${cuestionario.cuestionario_id}" class="mostrarLink">JUGAR<ion-icon name="play-circle"></ion-icon></a>
        </div>
      </article>
      <p>Resultados: </p>
        @if (count($cuestionario->plays) == 0)
          <h4>No hay partidas registradas aún :(</h4>
        @else
          <table>
            <tr>
              <th>Posición</th>
              <th>Usuario</th>
              <th>Errores</th>
              <th>Tiempo</th>
            </tr>
            <?php
              for ($i = 0; $i < count($cuestionario->plays); $i++) {

                $errores = 0;

                foreach (json_decode($cuestionario->plays[$i]->respuestas) as $play) {
                  if(!$play) {
                    $errores++;
                  }
                }

                if($i % 2 == 0) {
                ?>
                <tr>
                  <td><?="#" . ($i + 1)?></td>
                  <td>{{ $cuestionario->plays[$i]->usuario->name }}</td>
                  <td>{{ $errores }}</td>
                  <td>{{ $cuestionario->plays[$i]->tiempo }} seg.</td>
                </tr>
              <?php } else { ?>
                <tr>
                  <td class="lineaPar"><?="#" . ($i + 1)?></td>
                  <td class="lineaPar">{{ $cuestionario->plays[$i]->usuario->name }}</td>
                  <td class="lineaPar">{{ $errores }}</td>
                  <td class="lineaPar">{{ $cuestionario->plays[$i]->tiempo }} seg.</td>
                </tr>
              <?php }
              }
            ?>
          </table>
        @endif
      </section>
    </section>
  </main>
</body>
</html>

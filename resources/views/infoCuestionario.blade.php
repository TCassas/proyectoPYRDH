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
<body>
  <main id="mainBuscarCuestionario">
    <section id="menuBuscarCuestionario">
      <div>

        <!-- nombre de usuario -->

        <a href="/inicio" class="botonMenu">
          <ion-icon name="home"></ion-icon> Inicio
        </a>

        <a href="/cuestionarios" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>

      </div>
    </section>
    <section id="cuestionariosLista">
      <div class="cuestionarioRanking">
        <article class="articuloCuestionario">
          <div class="infoCuestionario">
            <div class="portadaCuestionario"
              @if ($cuestionario->portada != 'imagen predefinida')
                style="background-image: url(/storage/cuestionariosImgs/{{$cuestionario->portada}}); background-size: cover;">
              @else
                style="background-image: url(/imgs/fondoPunteado.jpg);">
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
            <p> Categoria: <span id="categoria">{{$cuestionario->categoria->nombre}}</span></p>
          </div>
          <div class="jugarCuestionario">
            <a href="preguntaTexto.php">
              <ion-icon name="play-circle"></ion-icon>
            </a>
          </div>
        </article>
      </div>
      <h1 class="tituloRanking">Ranking</h1>
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
  </main>
</body>
</html>

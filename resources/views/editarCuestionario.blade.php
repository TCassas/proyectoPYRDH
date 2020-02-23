<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <title>Document</title>
</head>
<body>
  <form action="resultado.php" enctype="multipart/form-data" method="POST">
  <main id="mainCreacionCuestinario">
    <section id="seccionIzquierdaCC">
      <section id="seccionPreguntasYRespuestas">
        @foreach ($cuestionario->preguntas4respuestas as $pregunta)
          <article class="pregunta preguntaCarta aquiTaH aquiTaV">
            <div class="grupoLI">
              <label for="Pregunta">Pregunta</label>
              <input type="text" value="{{$pregunta->consigna}}">
            </div>
            <div class="respuestas">
              <p>Respuestas <span>La primera debe ser la correcta!</span></p>
              <div>
                <input type="text" name="" placeholder="Respuesta 1" value="{{$pregunta->respuesta_correcta}}">
                <input type="text" name="" placeholder="Respuesta 2" value="{{$pregunta->segunda_respuesta}}">
                <input type="text" name="" placeholder="Respuesta 3" value="{{$pregunta->tercera_respuesta}}">
                <input type="text" name="" placeholder="Respuesta 4" value="{{$pregunta->cuarta_respeusta}}">
              </div>
            </div>
          </article>
        @endforeach
        @foreach ($cuestionario->preguntasvof as $pregunta)
          <article class="pregunta preguntaCarta aquiTaH aquiTaV">
              <div class="grupoLI">
                <label for="Pregunta">Pregunta</label>
                <input type="text" value="{{$pregunta->consigna}}">
              </div>
              <div class="respuestas">
                <p>Respuestas</p>

                @if ($pregunta->respuesta_correcta)
                  <div>
                    <div class="inputRadio">
                      <input type="radio" name="respuestavof{{$pregunta->id}}" id="respuestaVerdadero" class="radioInput" checked> <label for="respuestaVerdadero">Verdadero</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" name="respuestavof{{$pregunta->id}}" id="respuestaFalso" class="radioInput"> <label for="respuestaFalso">Falso</label>
                    </div>
                  </div>
                @else
                  <div>
                    <div class="inputRadio">
                      <input type="radio" name="respuestavof{{$pregunta->id}}" id="respuestaVerdadero" class="radioInput"> <label for="respuestaVerdadero">Verdadero</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" name="respuestavof{{$pregunta->id}}" id="respuestaFalso" class="radioInput" checked> <label for="respuestaFalso">Falso</label>
                    </div>
                  </div>
                @endif
              </div>
          </article>
        @endforeach
      </section>
    </section>
    <section id="seccionDerechaCC">
      <div id="formDerecho">
        <div class="grupoLI">
          <label for="">Nombre</label>
          <input type="text" name="nombre" value="{{$cuestionario->titulo}}">
        </div>
        <div class="grupoLI">
          <label for="">Portada</label>
          <input type="file" name="img" value="{{$cuestionario->portada}}">
        </div>
        <div class="grupoLI">
          <label for="">Descripcion</label>
          {{-- Agregar campo de descripcion --}}
          <textarea name="descripcion" rows="8" cols="80"></textarea>
        </div>
        <div>
          <label for="">Genero</label>
          <select name="genero" id="">

          </select>
        </div>
        <div id="botonesCC">
          <hr>
          <div>
            <h4>Agregar pregunta</h4>
          </div>
          <div>
            <button type="button" id="inputTexto">4 respuestas</button>
            <button type="button" id="inputVOF">Verdadero o falso</button>
          </div>
          <hr>
        </div>
        <button type="Submit">Enviar</button>
      </div>
      </form>
    </section>
  </main>


</body>
</html>

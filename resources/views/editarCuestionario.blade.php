<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/071307d3fb.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <title>Document</title>
</head>
<body>
  <form action="/cuestionarios/editar/{{$cuestionario->id}}" enctype="multipart/form-data" method="POST">
  {{csrf_field()}}
  <main id="mainCreacionCuestinario">
    <section id="seccionIzquierdaCC">
      <section id="seccionPreguntasYRespuestas">
        @foreach ($cuestionario->preguntas4respuestas as $pregunta)
          <article class="pregunta preguntaCarta aquiTaH aquiTaV">
            <div class="grupoLI">
              <label for="Pregunta">Pregunta</label>
              <input type="text" value="{{$pregunta->consigna}}" required>
              <input type="hidden" name="" value="{{$pregunta->id}}">
            </div>
            <div class="respuestas">
              <p>Respuestas <span>La primera debe ser la correcta!</span></p>
              <div>
                <input type="text" name="" placeholder="Respuesta 1" value="{{$pregunta->respuesta_correcta}}" required>
                <input type="text" name="" placeholder="Respuesta 2" value="{{$pregunta->segunda_respuesta}}" required>
                <input type="text" name="" placeholder="Respuesta 3" value="{{$pregunta->tercera_respuesta}}" required>
                <input type="text" name="" placeholder="Respuesta 4" value="{{$pregunta->cuarta_respuesta}}" required>
              </div>
            </div>
          </article>
        @endforeach
        @foreach ($cuestionario->preguntasvof as $pregunta)
          <input type="hidden" name="" value="{{$pregunta->id}}">
          <article class="pregunta preguntaCarta aquiTaH aquiTaV">
              <div class="grupoLI">
                <label for="Pregunta">Pregunta</label>
                <input type="text" value="{{$pregunta->consigna}}" required>
                <input type="hidden" name="" value="{{$pregunta->id}}">
              </div>
              <div class="respuestas">
                <p>Respuestas</p>

                @if ($pregunta->respuesta_correcta)
                  <div>
                    <div class="inputRadio">
                      <input type="radio" name="" class="radioInput" value=1 checked required> <label for="respuestaVerdadero">Verdadero</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" name="" class="radioInput" value=0 required> <label for="respuestaFalso">Falso</label>
                    </div>
                  </div>
                @else
                  <div>
                    <div class="inputRadio">
                      <input type="radio" name="" class="radioInput" value=1 required> <label for="respuestaVerdadero">Verdadero</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" name="" class="radioInput" value=0 checked required> <label for="respuestaFalso">Falso</label>
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
          <input type="text" name="nombre" value="{{$cuestionario->titulo}}" required>
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
          <label for="categoria">Genero</label>
          <select name="categoria" id="categoria" required>
            @foreach ($categorias as $categoria)
              @if ($cuestionario->categoria_id == $categoria->id)
                <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
              @endif
              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
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
        <input type="hidden" name="_method" value="put">
        <button type="Submit">Actualizar</button>
      </div>
      </form>
    </section>
  </main>

  <script src="{{asset('js/edicionDeCuestionario.js')}}" charset="utf-8"></script>
</body>
</html>

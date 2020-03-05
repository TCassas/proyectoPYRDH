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
  <form action="/cuestionarios/crear" enctype="multipart/form-data" method="POST">
  {{csrf_field()}}
  <main id="mainCreacionCuestinario">
    <section id="seccionIzquierdaCC">
      <section id="seccionPreguntasYRespuestas">

      </section>
    </section>
    <section id="seccionDerechaCC">
      <span id="desplegarMenu"><i class="fas fa-angle-double-right"></i></span>
      <div id="formDerecho">
        <div class="grupoLI">
          <label for="">Nombre</label>
          <input type="text" name="nombre" value="" required>
        </div>
        <div class="grupoLI">
          <label for="">Portada</label>
          <input type="file" name="img" value="">
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
        <button type="Submit">Actualizar</button>
      </div>
      </form>
    </section>
  </main>

  <script src="{{asset('js/menuDesplegableCuestionario.js')}}" charset="utf-8"></script>
  <script src="{{asset('js/edicionDeCuestionario.js')}}" charset="utf-8"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Document</title>
</head>
<body>
  <main id="mainCreacionCuestinario">
    <section id="seccionIzquierdaCC">
      <section id="seccionPreguntasYRespuestas">

      </section>
    </section>
    <section id="seccionDerechaCC">
      <form action="">
        <div class="grupoLI">
          <label for="">Nombre</label>
          <input type="text">
        </div>
        <div class="grupoLI">
          <label for="">Portada</label>
          <input type="file">
        </div>
        <div class="grupoLI">
          <label for="">Descripcion</label>
          <textarea name="name" rows="8" cols="80"></textarea>
        </div>
        <div>
          <label for="">Genero</label>
          <select name="genero" id="">
            <option value="">test</option>
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
      </form>
    </section>
  </main>

  <script src="js/creacionDeCuestionarios.js" charset="utf-8"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/styles.css">
  <title>Modifica tu información de usuario</title>
</head>
<body background="imgs/bg-body.png">
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <a href="/perfil" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <figure id="fotoUsuarioPerfil">
          <img src="" alt="">
        </figure>
        <article class="infoUsuarioPerfil">

          <form class="" action="/perfil/editar" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="grupoLIYEditar">
              <label for="">Nombre de usuario:</label>
              <input type="text" name="nombre" value="{{$usuario->name}}">
            </div>

            <div class="grupoLIYEditar">
              <label for="">Correo Electronico:</label>
              <input type="mail" name="correo" value="{{$usuario->email}}">
            </div>

            <div class="grupoLIYEditar">
              <label for="">Subir una foto de perfil</label>
              <input type="file" name="fotoPerfil" value="">
            </div>

            <button type="submit" name="button" class="enviarFormulario">Enviar</button>
          </form>

        </article>
      </section>
    </section>
  </main>
</body>
</html>

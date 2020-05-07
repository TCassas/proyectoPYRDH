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
  <title>Modifica tu información de usuario</title>
</head>
<body background="/storage/bg-body.png">
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <a href="/perfil/{{$usuario->id}}" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <figure id="fotoUsuarioPerfil">
          @if ($usuario->foto_perfil != "imagen predefinida")
            <img src="/storage/usuarioPerfil/{{$usuario->foto_perfil}}" alt="">
          @else
            <img src="/imgs/fondoPunteado.jpg" alt="">
          @endif
        </figure>
        <article class="infoUsuarioPerfil">

          <form class="" action="/perfil/editar" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="grupoLIYEditar">
              <label for="nombre">Nombre de usuario:</label>
              <input type="text" name="nombre" value="{{$usuario->name}}" required>
            </div>

            <div class="grupoLIYEditar">
              <label for="correo">Correo Electronico:</label>
              <input type="email" name="correo" value="{{$usuario->email}}" required>
            </div>

            <div class="grupoLIYEditar">
              <label for="fotoPerfil">Subir una foto de perfil</label>
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

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
<body background="imgs/bg-body.png">
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <a href="index.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <article class="infoUsuarioPerfil">

          <form class="" action="/perfil/passwordreset" method="post">
            {{csrf_field()}}
            <div class="grupoLIYEditar">
              <label for="">Email</label>
              <input type="email" name="correo" value="">
              <small></small>
            </div>

            <div class="grupoLIYEditar">
              <label for="">Nueva contraseña</label>
              <input type="password" name="newPassword" value="">
              <small></small>
            </div>

            <div class="grupoLIYEditar">
              <label for="">Confirmar contraseña</label>
              <input type="password" name="newPassword2" value="">
              <small></small>
            </div>
            <button type="submit" name="button" class="enviarFormulario">Enviar</button>
          </form>

        </article>
      </section>
    </section>
  </main>
</body>
</html>

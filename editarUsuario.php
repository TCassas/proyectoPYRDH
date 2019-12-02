<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Modifica tu información de usuario</title>
</head>
<body>
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <article id="fotoUsuarioPerfil">
          <ion-icon name="person"></ion-icon>
        </article>
        <article class="infoUsuarioPerfil">
          <?php session_start(); ?>
          <form class="" action="index.html" method="post">
            <div class="grupoLIYEditar">
              <label for="">Nombre de usuario:</label>
              <input type="text" name="nombre" value="<?= $_SESSION["usuario"]?>">
            </div>
            <div class="grupoLIYEditar">
              <label for="">Correo Electronico:</label>
              <input type="mail" name="correo" value="<?= $_SESSION["email"]?>">
            </div>
            <div class="grupoLIYEditar">
              <label for="">Fecha de nacimiento</label>
              <input type="date" name="fecha" value="<?= $_SESSION["fecha"]?>">
            </div>
            <button type="submit" name="button" class="enviarFormulario">Enviar</button>
          </form>
        </article>
      </section>
    </section>
  </main>
</body>
</html>

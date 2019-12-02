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
  <title>Modifica tu cuestionario</title>
</head>
<body background="imgs/bg-body.png">
  <?php session_start(); ?>
  <main id="mainInfoUsuario">
    <section id="cartaUsuario">
      <section id="info">
        <figure id="fotoUsuarioPerfil">
          <img src="<?= isset($_SESSION["fotoPerfil"]) ? $_SESSION["fotoPerfil"] : "imgs/fondoPunteado.jpg"?>" alt="">
        </figure>
        <article class="infoUsuarioPerfil">
          <p>Nombre de usuario: <?= $_SESSION["usuario"] ?></p>
          <p>Correo electronico: <?= $_SESSION["email"] ?></p>
          <p>Cantidad de cuestionarios creados: x</p>
          <p>Play count: x</p>
        </article>
      </section>
      <section id="configuracionUsuario">
        <a href="formularioPlay.php" class="botonMenu">Regresar</a>
        <a href="editarUsuario.php" class="botonMenu">Editar información</a>
        <a href="#" class="botonMenu">Cambiar contraseña</a>
        <a href="formularioDeIngreso.php" class="botonMenu">Cerrar sesión</a>
      </section>
    </section>
  </main>
</body>
</html>

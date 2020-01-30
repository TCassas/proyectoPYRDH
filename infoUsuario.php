<?php
  require("pdo.php");

  session_start();

  $query = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
  $query->bindValue(":id", $_SESSION['id']);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
?>

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
  <title>Tu perfil</title>
</head>
<body background="imgs/bg-body.png">
  <?php
    if(!empty($_SESSION)) {
  ?>
  <main id="mainInfoUsuario">
    <section id="cartaUsuario">
      <section id="info">
        <figure id="fotoUsuarioPerfil">
          <img src="<?= $result["img"] ?>" alt="">
        </figure>
        <article class="infoUsuarioPerfil">
          <p>Nombre de usuario: <?= $_SESSION["username"] ?></p>
          <p>Correo electronico: <?= $_SESSION["email"] ?></p>
          <p>Cantidad de cuestionarios creados: x</p>
          <p>Play count: x</p>
        </article>
      </section>
      <section id="configuracionUsuario">
        <a href="formularioPlay.php" class="botonMenu">Regresar</a>
        <a href="editarUsuario.php" class="botonMenu">Editar información</a>
        <a href="cambiarContrasenia.php" class="botonMenu">Cambiar contraseña</a>
        <a href="cerrarSesion.php" class="botonMenu">Cerrar sesión</a>
      </section>
    </section>
  <?php
    } else {
      include("temporales/requiereLogin.php");
    }
  ?>
  </main>
</body>
</html>

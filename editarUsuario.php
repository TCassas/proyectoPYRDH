<?php
  $errorCargaImagen = false;
  session_start();

  if(!empty($_FILES)) {
    var_dump($_FILES);
    if($_FILES["fotoPerfil"]["error"] != 0) {

    } else {
      $extension = pathinfo($_FILES["fotoPerfil"]["name"], PATHINFO_EXTENSION);

      if($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
        echo $extension;
        move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], "imgs/" . $_SESSION["usuario"] . "." . $extension);
        $_SESSION["fotoPerfil"] = "imgs/" . $_SESSION["usuario"] . "." . $extension;
        header("Location: infoUsuario.php");
      } else {
        $errorCargaImagen = true;
      }
    }
  }
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
  <title>Modifica tu información de usuario</title>
</head>
<body>
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <figure id="fotoUsuarioPerfil">
          <img src="<?= $_SESSION["fotoPerfil"] ?>" alt="">
        </figure>
        <article class="infoUsuarioPerfil">

          <form class="" action="editarUsuario.php" method="post" enctype="multipart/form-data">
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

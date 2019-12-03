<?php
  $archivo = file_get_contents("usuariosPYRDH.json");

  $errorCargaImagen = false;
  session_start();

  $errorUsuario  = "";
  $errorCorreo  = "";
  $errorImagen  = "";

  $cambios = 0;
  $i = 0;

  if(!empty($_POST['nombre'])) {
    if(strlen($_POST['nombre']) >= 4) {
      $archivoDeco = json_decode($archivo, true);

      foreach ($archivoDeco['usuarios'] as $usuario) {
        if($_SESSION['username'] == $usuario["username"]) {

          //Actualizo el valor de la sesion, porque de lo contrario quedaría con el valor asignado en el inicio de sesión
          $_SESSION["username"] = $_POST["nombre"];

          $usuario['username'] = $_POST["nombre"];

          array_splice($archivoDeco, $i);

          $archivoDeco['usuarios'][$i] = $usuario;

          $archivoDeco = json_encode($archivoDeco);

          file_put_contents("usuariosPYRDH.json", $archivoDeco);
        }

        $i++;
      }
      $cambios++;
    }
  }

  if(!empty($_POST)) {
    if(strlen($_POST['nombre']) == 0) {
      if (strlen($_POST['nombre']) < 4) {
        $errorUsuario = "El usuario no debe tener menos de 4 caracteres";
      }
    }
  }

  $i = 0;

  if(!empty($_POST['correo'])) {
    if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
      $archivoDeco = json_decode($archivo, true);

      foreach ($archivoDeco['usuarios'] as $usuario) {
        if($_SESSION['username'] == $usuario["username"]) {

          //Actualizo el valor de la sesion, porque de lo contrario quedaría con el valor asignado en el inicio de sesión
          $_SESSION["email"] = $_POST["correo"];

          $usuario["email"] = $_POST["correo"];

          array_splice($archivoDeco, $i);

          $archivoDeco['usuarios'][$i] = $usuario;

          $archivoDeco = json_encode($archivoDeco);

          file_put_contents("usuariosPYRDH.json", $archivoDeco);
        }

        $i++;
      }
      $cambios++;
    } else {
      $errorCorreo = "El correo no tiene el formato correcto";
    }
  }

  $i = 0;

  if(!empty($_FILES)) {
    if($_FILES["fotoPerfil"]["error"] != 0) {

    } else {

      $archivoDeco = json_decode($archivo, true);

      $extension = pathinfo($_FILES["fotoPerfil"]["name"], PATHINFO_EXTENSION);

      if($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
        move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], "imgs/" . $_SESSION["username"] . "." . $extension);
        $_SESSION["fotoPerfil"] = "imgs/" . $_SESSION["username"] . "." . $extension;

        //El archivo ya está abierto

        foreach ($archivoDeco['usuarios'] as $usuario) {
          if($_SESSION['username'] == $usuario["username"]) {
            $_SESSION["imgPerfil"] = "imgs/" . $_SESSION["username"] . "." . $extension;
            $usuario['imgPerfil'] = "imgs/" . $_SESSION["username"] . "." . $extension;

            array_splice($archivoDeco, $i);

            $archivoDeco['usuarios'][$i] = $usuario;
          }

          $i++;
        }

        $archivoDeco = json_encode($archivoDeco);

        file_put_contents("usuariosPYRDH.json", $archivoDeco);
      } else {
        $errorCargaImagen = true;
      }
    }
    $errorImagen = "No se pudo subir la imagen";
    $cambios++;
  }

  if($cambios == 3) {
    header("Location: infoUsuario.php");
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
        <a href="infoUsuario.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <figure id="fotoUsuarioPerfil">
          <img src="<?= $_SESSION["imgPerfil"]?>" alt="">
        </figure>
        <article class="infoUsuarioPerfil">

          <form class="" action="editarUsuario.php" method="post" enctype="multipart/form-data">

            <div class="grupoLIYEditar">
              <label for="">Nombre de usuario:</label>
              <input type="text" name="nombre" value="<?= $_SESSION["username"]?>">
              <small><?= $errorUsuario ?></small>
            </div>

            <div class="grupoLIYEditar">
              <label for="">Correo Electronico:</label>
              <input type="mail" name="correo" value="<?= $_SESSION["email"]?>">
              <small><?= $errorCorreo ?></small>
            </div>

            <div class="grupoLIYEditar">
              <label for="">Subir una foto de perfil</label>
              <input type="file" name="fotoPerfil" value="">
              <small><?= $errorImagen ?></small>
            </div>

            <button type="submit" name="button" class="enviarFormulario">Enviar</button>
          </form>

        </article>
      </section>
    </section>
  </main>
</body>
</html>

<?php
  $errorContraseña = "";
  $errorNuevaContraseña = "";

  require("pdo.php");
  require("Usuario.php");

  $errorCargaImagen = false;
  session_start();

  $errorUsuario  = "";
  $errorCorreo  = "";
  $errorImagen  = "";

  $query = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
  $query->bindValue(":id", $_SESSION['id']);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);

  $cambios = 0;
  $i = 0;

  if(!empty($_POST['nombre'])) {
    if(strlen($_POST['nombre']) >= 4) {
      //Actualizo el valor de la sesion, porque de lo contrario quedaría con el valor asignado en el inicio de sesión
      $_SESSION["username"] = $_POST["nombre"];

      $query = $db->prepare("UPDATE usuarios SET nombre = :nombre WHERE id = :id");
      $query->bindValue(":nombre", $_POST['nombre']);
      $query->bindvalue(":id", $_SESSION["id"]);
      $query->execute();
    }
    $i++;
  }

  if(!empty($_POST)) {
    if(strlen($_POST['nombre']) == 0) {
      if (strlen($_POST['nombre']) < 4) {
        $errorUsuario = "El usuario no debe tener menos de 4 caracteres";
      }
    }
  }

  if(!empty($_POST['correo'])) {
    if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
      //Actualizo el valor de la sesion, porque de lo contrario quedaría con el valor asignado en el inicio de sesión
      $_SESSION["email"] = $_POST["correo"];

      $query2 = $db->prepare("UPDATE usuarios SET mail = :mail WHERE id = :id");
      $query2->bindValue(":mail", $_POST['correo']);
      $query2->bindvalue(":id", $_SESSION["id"]);
      $query2->execute();
    } else {
      $errorCorreo = "El correo no tiene el formato correcto";
    }
    $i++;
  }

  if(!empty($_FILES)) {
    if($_FILES["fotoPerfil"]["error"] != 0) {

    } else {
      $extension = pathinfo($_FILES["fotoPerfil"]["name"], PATHINFO_EXTENSION);

      if($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
        unlink($result["img"]);

        move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], "imgs/" . $_SESSION["username"] . "." . $extension);

        $_SESSION["imgPerfil"] = "imgs/" . $_SESSION["username"] . "." . $extension;

        $query3 = $db->prepare("UPDATE usuarios SET img = :img WHERE id = :id");
        $query3->bindValue(":img", $_SESSION["imgPerfil"]);
        $query3->bindvalue(":id", $_SESSION["id"]);
        $query3->execute();
      } else {
        $errorCargaImagen = true;
      }
    }
    $errorImagen = "No se pudo subir la imagen";
    $i++;
  }

  if($i == 3) {
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
<body background="imgs/bg-body.png">
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <a href="infoUsuario.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <figure id="fotoUsuarioPerfil">
          <img src="<?= $result["img"] ?>" alt="">
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

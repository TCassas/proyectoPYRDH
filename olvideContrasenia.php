<?php
    $errorContraseña = "";
    $errorNuevaContraseña = "";

    require("pdo.php");
    require("Usuario.php");

    session_start();

    if(!empty($_POST)) {
      $infoFormulario = [
        "correo" => $_POST["correo"],
        "newPassword" => $_POST["newPassword"],
        "newPassword2" => $_POST["newPassword2"]
      ];

      $query = $db->prepare("SELECT * FROM usuarios WHERE mail = :mail");

      $query->bindValue(":mail", $infoFormulario['correo']);

      $query->execute();

      foreach ($archivoDeco['usuarios'] as $usuario) {
        if($usuario["email"] == $infoFormulario["correo"]) {
          $correo = $usuario["email"];
          if($infoFormulario["newPassword"] == $infoFormulario["newPassword2"]) {
            if(strlen($infoFormulario["newPassword"]) >= 6 && strlen($infoFormulario["newPassword2"]) >= 6) {
              $usuario['password'] = password_hash($infoFormulario["newPassword"], PASSWORD_DEFAULT);

              array_splice($archivoDeco, $i);

              $archivoDeco['usuarios'][$i] = $usuario;

              $archivoDeco = json_encode($archivoDeco);

              file_put_contents("usuariosPYRDH.json", $archivoDeco);

              header("Location: formularioDeIngreso.php");
              exit;
            } else {
              $errorNuevaContraseña = "Las contraseñas deben tener <br> al menos 6 caracteres";
            }
          } else {
            $errorNuevaContraseña = "Las contraseñas no son iguales";
          }
        } else {
          $errorContraseña = "Ese correo no pertenece a ninguna cuenta registrada";
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
<body background="imgs/bg-body.png">
  <main id="mainInfoUsuario">
    <section id="cartaUsuarioEditar">
      <section id="infoUsuarioEditar">
        <a href="index.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <article class="infoUsuarioPerfil">

          <form class="" action="olvideContrasenia.php" method="post">
            <div class="grupoLIYEditar">
              <label for="">Email</label>
              <input type="email" name="correo" value="<?= (isset($correo)) ? $correo : "" ?>">
              <small><?= $errorContraseña ?></small>
            </div>

            <div class="grupoLIYEditar">
              <label for="">Nueva contraseña</label>
              <input type="password" name="newPassword" value="">
              <small><?= $errorNuevaContraseña ?></small>
            </div>

            <div class="grupoLIYEditar">
              <label for="">Confirmar contraseña</label>
              <input type="password" name="newPassword2" value="">
              <small><?= $errorNuevaContraseña ?></small>
            </div>
            <button type="submit" name="button" class="enviarFormulario">Enviar</button>
          </form>

        </article>
      </section>
    </section>
  </main>
</body>
</html>

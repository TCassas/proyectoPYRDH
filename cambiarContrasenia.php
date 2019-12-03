<?php
    $archivo = file_get_contents("usuariosPYRDH.json");

    $errorContraseña = "";
    $errorNuevaContraseña = "";

    session_start();

    $i = 0;

    if(!empty($_POST)) {
      $infoFormulario = [
        "password" => $_POST["password"],
        "newPassword" => $_POST["newPassword"],
        "newPassword2" => $_POST["newPassword2"]
      ];

      $archivoDeco = json_decode($archivo, true);

      foreach ($archivoDeco['usuarios'] as $usuario) {
        if(password_verify($infoFormulario["password"], $usuario["password"])) {
          if($infoFormulario["newPassword"] == $infoFormulario["newPassword2"]) {
            if(strlen($infoFormulario["newPassword"]) >= 6 && strlen($infoFormulario["newPassword2"]) >= 6) {
              if(!password_verify($infoFormulario["newPassword"], $usuario["password"])) {
                $_SESSION["password"] = $infoFormulario["password"];

                $usuario['password'] = password_hash($infoFormulario["newPassword"], PASSWORD_DEFAULT);

                array_splice($archivoDeco, $i);

                $archivoDeco['usuarios'][$i] = $usuario;

                $archivoDeco = json_encode($archivoDeco);

                file_put_contents("usuariosPYRDH.json", $archivoDeco);

                header("Location: infoUsuario.php");
                exit;
              } else {
                $errorContraseña = "Tu nueva contraseña no puede ser la <br> misma que la actual";
              }
            } else {
              $errorNuevaContraseña = "Las contraseñas deben tener <br> al menos 6 caracteres";
            }
          } else {
            $errorNuevaContraseña = "Las contraseñas no son iguales";
          }
        } else {
          $errorContraseña = "Esa no es tu actual contraseña";
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
        <a href="infoUsuario.php" class="botonMenu">
          <ion-icon name="arrow-round-back"></ion-icon> Regresar
        </a>
        <article class="infoUsuarioPerfil">

          <form class="" action="cambiarContrasenia.php" method="post">

            <div class="grupoLIYEditar">
              <label for="">Contraseña actual</label>
              <input type="password" name="password" value="">
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

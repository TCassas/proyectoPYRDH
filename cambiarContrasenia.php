<?php
    $errorContraseña = "";
    $errorNuevaContraseña = "";

    require("pdo.php");
    require("Usuario.php");

    session_start();

    $i = 0;

    if(!empty($_POST)) {
      $infoFormulario = [
        "password" => $_POST["password"],
        "newPassword" => $_POST["newPassword"],
        "newPassword2" => $_POST["newPassword2"]
      ];

      $query = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
      $query->bindValue(":id", $_SESSION['id']);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);

      if(password_verify($infoFormulario["password"], $result["contrasenia"])) {

        if($infoFormulario["newPassword"] == $infoFormulario["newPassword2"]) {

          if(strlen($infoFormulario["newPassword"]) >= 6 && strlen($infoFormulario["newPassword2"]) >= 6) {

            if(!password_verify($infoFormulario["newPassword"], $result["contrasenia"])) {

              $query2 = $db->prepare("UPDATE usuarios SET contrasenia = :contrasenia WHERE id = :id");
              $query2->bindValue(":contrasenia", password_hash($infoFormulario["newPassword"], PASSWORD_DEFAULT));
              $query2->bindvalue(":id", $_SESSION["id"]);
              $query2->execute();

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

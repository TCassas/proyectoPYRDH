<?php

require("pdo.php");
require("Usuario.php");

session_start();

//Si el usuario está logeado, no tiene acceso a las paginas de login y sing in
if(!empty($_SESSION)) {
  header("Location: formularioPlay.php");
}

require('controladores/funciones.php');

$arrayDeErrores = [];
$errorInicioSesion = false;

if($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);
    if(count($arrayDeErrores) == 0 || $arrayDeErrores == NULL) {
        // REGISTRO AL USUARIO
        $usuarioFinal = [
            'username' =>$_POST['username'],
            'password' => $_POST['password']
        ];

        $query = $db->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");

        $query->bindValue(":nombre", $usuarioFinal['username']);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) == 1) {
          if(password_verify($usuarioFinal['password'], $result[0]['contrasenia'])) {
            $_SESSION["id"] = $result[0]['id'];
            $_SESSION["username"] = $result[0]["nombre"];
            $_SESSION["email"] = $result[0]["mail"];
            $_SESSION["imgPerfil"] = $result[0]["imgPerfil"];

            if(isset($_POST["recordarUsuario"]) && $_POST["recordarUsuario"] == "siRecordar") {
              setcookie("usuarioRecordado", $usuario["username"], time() + 60 * 60 * 60 * 24 * 365);
            }

            header("Location: formularioPlay.php");
            exit;
          }
        }

        $errorInicioSesion = true;
      }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Document</title>
</head>
<body>


    <div id="seccionizquierda">
        <img src="imgs/images.jpg" alt="" class="imagenLogin">
    </div>

    <div id="seccionderecha">


        <p id="titulo"> Iniciar sesion</p>
        <div id="seccionderechaformu">
          <form action="formularioDeIngreso.php" method="POST" id="formulario">

              <label for="username" id="it"> Usuario</label>
              <input type="text" id="username" name="nombre" class="inputFormularioIngreso" value="<?= (isset($_COOKIE["usuarioRecordado"])) ? $_COOKIE["usuarioRecordado"] : persistirDato($arrayDeErrores, 'username') ?>">
              <small class="text-danger"><?= isset($arrayDeErrores['username']) ? $arrayDeErrores['username'] : "" ?></small>

              <label for="password" id="it"> Contraseña</label>
              <input type="password" id="password" name="contrasenia" class="inputFormularioIngreso">
              <small class="text-danger"><?= isset($arrayDeErrores['password']) ? $arrayDeErrores['password'] : "" ?></small>

              <label for="password">Recordar usuario</label>
              <input type="checkbox" id="password" name="recordarUsuario" class="inputFormularioIngreso" value="siRecordar">

              <button type="submit" name="button" id="it">ENVIAR</button>
              <small class="text-danger"><?= ($errorInicioSesion) ? "Los datos ingresados no corresponden a una cuenta registrada" : "" ?></small>
          </form>
        </div>

        <p id="i">¿No tenes una cuenta?  <a href="index.php">Registrate </a></p>
        <p id="i"><a href="olvideContrasenia.php">Recuperar contraseña</a></p>



</body>
</html>


<?php

session_start();

//Si el usuario está logeado, no tiene acceso a las paginas de login y sing in
if(!empty($_SESSION)) {
  header("Location: formularioPlay.php");
}

require_once 'controladores/funciones.php';

$arrayDeErrores = "";
$errorInicioSesion = false;

if($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);
    if(count($arrayDeErrores) === 0) {
        // REGISTRO AL USUARIO
        $usuarioFinal = [
            'username' =>$_POST['username'],
            'password' => $_POST['password']
        ];

        $archivo = file_get_contents("usuariosPYRDH.json");
        $archivoDeco = json_decode($archivo, true);

        foreach ($archivoDeco['usuarios'] as $usuario) {
          if($usuario['username'] == $usuarioFinal['username'] && password_verify($usuarioFinal['password'], $usuario['password'])) {

            //Creo una sesión con información util del usuario

            $_SESSION["username"] = $usuario["username"];
            $_SESSION["email"] = $usuario["email"];
            $_SESSION["password"] = $usuario["password"];
            $_SESSION["imgPerfil"] = $usuario["imgPerfil"];

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
              <input type="text" id="username" name="username" class="inputFormularioIngreso" value="<?= (isset($_COOKIE["usuarioRecordado"])) ? $_COOKIE["usuarioRecordado"] : persistirDato($arrayDeErrores, 'username') ?>">
              <small class="text-danger"><?= isset($arrayDeErrores['username']) ? $arrayDeErrores['username'] : "" ?></small>

              <label for="password" id="it"> Contraseña</label>
              <input type="password" id="password" name="password" class="inputFormularioIngreso">
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

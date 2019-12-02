
<?php

session_start();
require_once 'controladores/funciones.php';

$arrayDeErrores = "";

if($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);
    if(count($arrayDeErrores) === 0) {
        // REGISTRO AL USUARIO
        $usuarioFinal = [
            'username' =>$_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
}
}


  if(!empty($_POST)) {
    $archivo = file_get_contents("usuariosPYRDH.json");
    $archivoDeco = json_decode($archivo, true);

    // var_dump($_POST);

    foreach($archivoDeco["usuarios"] as $usuario) {
      if($_POST["username"] == $usuario["username"] && password_verify($_POST["password"], $usuario["password"])) {
        header("Location: formularioPlay.php");
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
     <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Document</title>
</head>
<body>


    <div id="seccionizquierda">
        <img src="imgs/images.jpg" alt="">
    </div>

    <div id="seccionderecha">


        <p id="titulo"> Iniciar sesion</p>
        <div id="seccionderechaformu">
          <form action="formularioDeIngreso.php" method="POST" id="formulario">

              <label for="username" id="it"> Usuario</label>
              <input type="text" id="username" name="username" class="inputFormularioIngreso" value="<?= persistirDato($arrayDeErrores, 'username'); ?>">
              <small class="text-danger"><?= isset($arrayDeErrores['username']) ? $arrayDeErrores['username'] : "" ?></small>

              <label for="password" id="it"> Contraseña</label>
              <input type="password" id="password" name="password" class="inputFormularioIngreso">
<small class="text-danger"><?= isset($arrayDeErrores['password']) ? $arrayDeErrores['password'] : "" ?></small>
              <button type="submit" name="button" id="it">ENVIAR</button>
          </form>
        </div>

        <p id="i">¿No tenes una cuenta?  <a href="index.php">Registrate </a></p>
        <p id="i"><a href="">Recuperar contraseña</a></p>

</body>
</html>

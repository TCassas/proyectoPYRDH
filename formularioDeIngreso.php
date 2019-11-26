<?php
  if(isset($_POST["username"]) && isset($_POST["password"])) {
    header('Location: formularioPlay.php');
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
              <label for="" id="it"> Usuario</label>
                  <input type="text" id="" name="username" class="inputFormularioIngreso">
              <label for="" id="it"> Contraseña</label>
                  <input type="password" id="" name="password" class="inputFormularioIngreso">
              <button type="submit" name="button" id="it">ENVIAR</button>
          </form>
        </div>

        <p id="i">¿No tenes una cuenta?  <a href="#">Registrate </a></p>
        <p id="i"><a href="">Recuperar contraseña</a></p>

</body>
</html>

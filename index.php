<?php


session_start();

require("pdo.php");
require("Usuario.php");

//Si el usuario está logeado, no tiene acceso a las paginas de login y sing in
if(!empty($_SESSION)) {
  header("Location: formularioPlay.php");
}

require('controladores/funciones.php');

$arrayDeErrores = [];

if($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);
    if(count($arrayDeErrores) == 0 || $arrayDeErrores == NULL) {
      $usuarioFinal = [
          'username' => trim($_POST['username']),
          'email' => $_POST['email'],
          'password' => $_POST['password'],
          'imgPerfil' => 'imgs/fondoPunteado.jpg'
      ];


      $usuario = New Usuario($usuarioFinal['username'], $usuarioFinal['email'], $usuarioFinal['password']);

      //echo var_dump(Date("Y-m-d"));

      $query = $db->prepare("INSERT INTO usuarios VALUES(default, :nombre, :mail, :contrasenia, :fecha, :img)");
      $query->bindValue(":nombre", $usuario->getNombre());
      $query->bindValue(":mail", $usuario->getMail());
      $query->bindValue(":contrasenia", $usuario->getContrasenia());
      $query->bindValue(":fecha", Date("Y-m-d"));
      $query->bindValue(":img", 'imgs/fondoPunteado.jpg');

      $query->execute();


      // ENVIAR A LA BASE DE DATOS $usuarioFinal
      // $archivo = file_get_contents("usuariosPYRDH.json");
      // $archivoDeco = json_decode($archivo, true);
      //
      // $archivoDeco['usuarios'][] = $usuarioFinal;
      //
      // $archivoDeco = json_encode($archivoDeco);
      //
      // file_put_contents("usuariosPYRDH.json", $archivoDeco);
      //
      header("Location: registrook.php");

      exit;
    }
}


?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Preguntados</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body background="imgs/bg-body.png">


  <nav id="navLogin">
  <div class="contenedor-nav">
  	<h1>REGISTRO</h1>
  </div>
  </nav>

<main id="mainLogin2">

	<section id="sectionLogin1">
<div class="formu">
  <form method="POST" action=>

        <div class="contenedor">
    		<label for="username">Usuario</label>
    		<input type="text" name="username" id="username" value="<?= persistirDato($arrayDeErrores, 'username'); ?>">
    		<small class="text-danger"><?= isset($arrayDeErrores['username']) ? $arrayDeErrores['username'] : "" ?></small>
    	</div>


      <div class="contenedor">
    		<label for="email">Correo</label>
    		<input type="email" name="email" id="email" value="<?= persistirDato($arrayDeErrores, 'email'); ?>">
    		<small class="text-danger"><?= isset($arrayDeErrores['email']) ? $arrayDeErrores['email'] : "" ?></small>
    	</div>


      <div class="contenedor">
    		<label for="password">Contraseña</label>
    	 <input type="password" name="password" id="password">
    		 <small class="text-danger"><?= isset($arrayDeErrores['password']) ? $arrayDeErrores['password'] : "" ?></small>
    	</div>

      <div class="contenedor">
    		<label for="pass2">Verificar Contraseña</label>
    	 <input type="password" name="repassword" id="pass2">
    	 <small class="text-danger"><?= isset($arrayDeErrores['repassword']) ? $arrayDeErrores['repassword'] : "" ?></small>
    	</div>

	<!-- </br> <div class="contenedor">
			<label for="dias">Fecha de Nacimiento</label> <br>
		<input type="date">
	</div> -->

</br> <div id="enviarle" class="contenedor">
	<button type="submit" id="botonEnviarRegistro" >Registrarse</button>
</div> </br>
<p id="i">¿Ya tienes una cuenta?  <a href="formularioDeIngreso.php">Ingresa </a></p>

  </form>
</div>
  </section>

  <section id="sectionLogin2">
  	<div class="contenedor-section2">
  		<img src="imgs/foto.jpg" alt="" class="foto">
  	</div>
  </section>

</main>

	<footer id="footerLogin">
  <div class="final">

		<img src="imgs/fb-logo.png" alt="" class="redes">
		<img src="imgs/instagram.png" alt="" class="redes">
		<img src="imgs/twitter.png" alt="" class="redes">

	</footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

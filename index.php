<?php

session_start();
require_once 'controladores/funciones.php';

$arrayDeErrores = "";

if($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);
    if(count($arrayDeErrores) === 0) {
        // REGISTRO AL USUARIO
        $usuarioFinal = [
            'username' => trim($_POST['username']),
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        // ENVIAR A LA BASE DE DATOS $usuarioFinal

        //Guardo en $archivo el contenido del JSon
        $archivo = json_decode(file_get_contents("usuariosPYRDH.json"), true);

        //Trato el contenido del archivo como un array, es decir, un array donde cada elemento del mismo es un usuario
        $archivo['usuarios'][] = $usuarioFinal;

        //Subir lo anteriormente mencionado al archivo nuevamente -- Esto reescribe el contenido, habría que ver como se podría usar lo de FILE_APPEND
        $jsonDeUsuario = json_encode($archivo);
        file_put_contents('usuariosPYRDH.json', $jsonDeUsuario);
        header("Location: formularioDeIngreso.php");
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
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body background="imgs/bg-body.png">


	<nav>
<img src="imgs/descarga.png" alt="">
	</nav>


	<section>
		<form method="POST" action=>

	</br> </br> <div class="contenedor">
			<label for="username">Usuario</label> <br>
			<input type="text" name="username" id="nombre" value="<?= persistirDato($arrayDeErrores, 'nombre'); ?>">
			<small class="text-danger"><?= isset($arrayDeErrores['nombre']) ? $arrayDeErrores['nombre'] : "" ?></small>
		</div>


	</br> <div class="contenedor">
			<label for="email">Correo</label> <br>
			<input type="email" name="email" id="email" value="<?= persistirDato($arrayDeErrores, 'email'); ?>">
			<small class="text-danger"><?= isset($arrayDeErrores['email']) ? $arrayDeErrores['email'] : "" ?></small>
		</div> </br>


	</br> <div class="contenedor">
			<label for="password">Contraseña</label> <br>
		 <input type="password" name="password" id="password">
		   <small class="text-danger"><?= isset($arrayDeErrores['password']) ? $arrayDeErrores['password'] : "" ?></small>
		</div>

		</br> <div class="contenedor">
			<label for="pass2">Verificar Contraseña</label> <br>
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
	</section>

	<footer>
  <div class="final">

		<div class="redes">
		<img src="imgs/fb-logo.png" alt="">
		<img src="imgs/instagram.png" alt="">
		<img src="imgs/twitter.png" alt="">
		</div>
	</div>
	</footer>

</body>
</html>

<?php


session_start();

//Si el usuario está logeado, no tiene acceso a las paginas de login y sing in
if(!empty($_SESSION)) {
  header("Location: formularioPlay.php");
}

require_once 'controladores/funciones.php';

$arrayDeErrores = "";

if($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);
    if(count($arrayDeErrores) === 0) {
      // REGISTRO AL USUARIO
      $usuarioFinal = [
          'username' => trim($_POST['username']),
          'email' => $_POST['email'],
          'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
          'imgPerfil' => 'imgs/fondoPunteado.jpg'
      ];
      // ENVIAR A LA BASE DE DATOS $usuarioFinal
      $archivo = file_get_contents("usuariosPYRDH.json");
      $archivoDeco = json_decode($archivo, true);

      $archivoDeco['usuarios'][] = $usuarioFinal;

      $archivoDeco = json_encode($archivoDeco);

      file_put_contents("usuariosPYRDH.json", $archivoDeco);

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
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body background="imgs/bg-body.png">


  <nav>
  <div class="contenedor-nav">
  	<h1>REGISTRO</h1>
  </div>
  </nav>

<main>

	<section>
		<div class="registrook">

			<div class="alert alert-success" role="alert">
	  	USUARIO CREADO EXITOSAMENTE!
			</div>
			<a href="formularioDeIngreso.php" ><input type="button" id="botonEnviarRegistro" value="Volver a Inicio"></a>
		</div>

  </section>

  <section>
  	<div class="contenedor-section2">
  		<img src="imgs/foto.jpg" alt="" class="foto">
  	</div>
  </section>

</main>

	<footer>
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

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
		<form action="formularioDeIngreso.php" method="POST">

	</br> </br> <div class="contenedor">
			<label for="nombre">Usuario</label> <br>
			<input type="text" name="name" id="nombre">
		</div>

	</br> <div class="contenedor">
			<label for="password">Contraseña</label> <br>
		 <input type="password" name="password" id="password">
		</div>

		</br> <div class="contenedor">
			<label for="pass2">Verificar Contraseña</label> <br>
		 <input type="password" name="" id="pass2">
	</div>

	</br> <div class="contenedor">
			<label for="email">Correo</label> <br>
			<input type="email" name="email" id="email">
		</div> </br>

	</br> <div class="contenedor">
			<label for="dias">Fecha de Nacimiento</label> <br>
		<input type="date">
	</div>

	</br> <div id="enviarle" class="contenedor">
		<input type="submit" value="Enviar" id="botonEnviarRegistro" >
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

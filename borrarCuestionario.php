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
  <title>Modifica tu cuestionario</title>
</head>
<body background="imgs/bg-body.png">
  <main id="mainLogin">
    <h1>¿Está seguro de que que quiere borrar este cuestionario?</h1>
    <div class="divBorrarCuestionario">
      <a href="borrar.php?id=<?= $_GET["id"] ?>">Sí</a>
      <a href="#">No</a>
    </div>
  </main>
</body>
</html>

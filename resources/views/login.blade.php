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
          <form action="{{ route('login') }}" method="POST" id="formulario">
            {{csrf_field()}}

            <label for="username" id="it"> Usuario</label>
            <input type="text" id="username" name="nombre" class="inputFormularioIngreso" value="">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" id="it"> Contraseña</label>
            <input type="password" id="password" name="contrasenia" class="inputFormularioIngreso">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="remember">Recordar usuario</label>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <button type="submit" name="button" id="it">ENVIAR</button>
            <small class="text-danger"></small>
          </form>
        </div>

        <p id="i">¿No tenes una cuenta?  <a href="/">Registrate </a></p>
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Recuperar contraseña') }}
            </a>
        @endif



</body>
</html>

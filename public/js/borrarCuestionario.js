window.onload = function() {
  let borrarCuestionario = document.querySelectorAll(".borrarCuestionario");

  borrarCuestionario.forEach(function(boton) {
    boton.onclick = function(e) {
      let respuesta = confirm("¿Seguro que deseas borrar este cuestionario?");

      if(respuesta) {

      } else {
        e.preventDefault();
      }
    }
  });
}

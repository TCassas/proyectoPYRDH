window.onload = function() {
  let botonDesplegar = document.querySelector('#desplegarMenu'),
      seccionDerecha = document.querySelector('#seccionDerechaCC');

  botonDesplegar.onclick = function() {
    seccionDerecha.classList.toggle('ocultarMenu');
  }
}

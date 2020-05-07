window.onload = function() {
  let menuBoton = document.querySelector(".menu-boton > ion-icon"),
      menuDesplegable = document.querySelector("#menu-links"),
      links = document.querySelectorAll("#menu-links a");

  //Menu desplegable
  menuBoton.addEventListener('click', (e) => {
    menuDesplegable.classList.toggle("mostrarMenu");
  });
}

window.onload = function() {
  let menuBoton = document.querySelector(".menu-boton > ion-icon"),
      menuDesplegable = document.querySelector("#menu-links"),
      links = document.querySelectorAll("#menu-links a");

  //Menu desplegable
  menuBoton.addEventListener('click', (e) => {
    menuDesplegable.classList.toggle("mostrarMenu");
  });

  //Todo eso es para hacer la animación de los cuestionarios
  let allCuestionarios = document.querySelectorAll("article.cuestionario");
  
  for(let i = 0; i < allCuestionarios.length; i++) {
    allCuestionarios[i].addEventListener('click', (e) => {
      e.stopPropagation();
      allCuestionarios[i].classList.toggle("cuestionario-desplegado");
      allCuestionarios[i].children[0].classList.toggle("cuestionario-info_desplegada");
      allCuestionarios[i].children[0].children[0].classList.toggle("cuestionario-titulo_desplegada");
      allCuestionarios[i].children[0].children[1].classList.toggle("marginAutor");
      allCuestionarios[i].children[0].children[2].classList.toggle("descripcion-desplegada");
      allCuestionarios[i].children[0].children[3].classList.toggle("cuestionario-info_jugable-desplegada");
      allCuestionarios[i].children[1].children[0].classList.toggle("cuestionario-imagen_desplegada");
      allCuestionarios[i].children[1].children[1].classList.toggle("mostrarLink");
    });
  }
}

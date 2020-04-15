window.onload = function() {
  let menuBoton = document.querySelector(".menu-boton > ion-icon"),
      menuDesplegable = document.querySelector("#menu-links"),
      links = document.querySelectorAll("#menu-links a"),
      botonBuscar = document.querySelector("#botonBuscar"),
      inputBuscar = document.querySelector("#cuestionarioBusqueda"),
      desplegado = false;

  botonBuscar.addEventListener('click', (e) => {
    hacerFetch();
  });

  inputBuscar.addEventListener('keypress', (e) => {
    if(e.key === "Enter") {
      hacerFetch();
      e.preventDefault();
    }
  });

  //Menu desplegable
  menuBoton.addEventListener('click', (e) => {
    menuDesplegable.classList.toggle("mostrarMenu");
  });

  let columnaIzquierda = document.querySelector('#columnaIzquierdaCuestionarios'),
      columnaDerecha = document.querySelector('#columnaDerechaCuestionarios');

  //Fetch que trae todos los cuestionarios en la base de datos
  fetch('/api/cuestionarios')
  .then((response) => {
    return response.json();
  })
  .then((cuestionarios) => {
    armarCuestionarios(cuestionarios);
  })
  .catch((err) => {
    console.log(err);
  });

  //Recibe los cuestionarios ya sea por busqueda, o por el fetch inicial
  function armarCuestionarios(cuestionarios) {
    columnaIzquierda.innerHTML = "";
    columnaDerecha.innerHTML = "";
    console.log(cuestionarios);
    cuestionarios.forEach((cuestionario, i) => {
      //If para determinar si el cuestionario tiene o no una imagen en la BD (elige entre la predefinida o la de la BD)
      let portada = "";
      if(cuestionario.portada == "imagen predefinida") {
        portada = "/imgs/fondoPunteado.jpg";
      } else {
        portada = `/storage/cuestionariosImgs/${cuestionario.portada}`;
      }


      if(i % 2 == 0) {
        columnaIzquierda.innerHTML += `
        <article class="cuestionario">
          <div class="cuestionario-info">
            <h4>${cuestionario.titulo}</h4>
            <p>By: <a href="#">${cuestionario.usuario_nombre}</a></p>
            <p class="descripcion">Descripción: <span>${cuestionario.descripcion}</span></p>
            <div class="cuestionario-info_jugable">
              <p><ion-icon name="play-circle"></ion-icon> 100</p>
              <p><ion-icon name="heart"></ion-icon> 100</p>
            </div>
          </div>
          <div class="cuestionario-actions">
            <div class="cuestionario-imagen" style="background-image: url(${portada}); background-size: cover;">

            </div>
            <a href="/cuestionarios/jugar/${cuestionario.cuestionario_id}">JUGAR<ion-icon name="play-circle"></ion-icon></a>
          </div>
        </article>
        `;
      } else {
        columnaDerecha.innerHTML += `
        <article class="cuestionario">
          <div class="cuestionario-info">
            <h4>${cuestionario.titulo}</h4>
            <p>By: <a href="#">${cuestionario.usuario_nombre}</a></p>
            <p class="descripcion">Descripción: <span>${cuestionario.descripcion}</span></p>
            <div class="cuestionario-info_jugable">
              <p><ion-icon name="play-circle"></ion-icon> 100</p>
              <p><ion-icon name="heart"></ion-icon> 100</p>
            </div>
          </div>
          <div class="cuestionario-actions">
            <div class="cuestionario-imagen" style="background-image: url(${portada}); background-size: cover;">

            </div>
            <a href="/cuestionarios/jugar/${cuestionario.cuestionario_id}">JUGAR<ion-icon name="play-circle"></ion-icon></a>
          </div>
        </article>
        `;
      }
    });

    //Todo eso es para hacer la animación de los cuestionarios
    let allCuestionarios = document.querySelectorAll("article.cuestionario");

    for(let i = 0; i < allCuestionarios.length; i++) {
      allCuestionarios[i].addEventListener('click', (e) => {
        e.stopPropagation();
        allCuestionarios[i].classList.toggle("cuestionario-desplegado");
        allCuestionarios[i].children[0].classList.toggle("cuestionario-info_desplegada");
        allCuestionarios[i].children[0].children[0].classList.toggle("marginh4");
        allCuestionarios[i].children[0].children[1].classList.toggle("marginAutor");
        allCuestionarios[i].children[0].children[2].classList.toggle("descripcion-desplegada");
        allCuestionarios[i].children[0].children[3].classList.toggle("cuestionario-info_jugable-desplegada");
        allCuestionarios[i].children[1].children[0].classList.toggle("cuestionario-imagen_desplegada");
        allCuestionarios[i].children[1].children[1].classList.toggle("mostrarLink");
      });
    }


    //allCuestionarios.children[0] es cuestionario-info
      //allCuestionarios.children[0].children[0] es h4
      //allCuestionarios.children[0].children[1] es p
      //allCuestionarios.children[0].children[2] es p (descripcion)
      //allCuestionarios.children[0].children[3] es div (info_jugable)
    //allCuestionarios.children[1] es cuestionario-actions
      //allCuestionarios.children[1].children[0] es div cuestionario-imagen
      //allCuestionarios.children[1].children[1] es a
  }

  //Realiza el fetch, ya sea si se pulsó enter o se le hizo click al boton
  function hacerFetch() {
    let busqueda = {
      termino: inputBuscar.value
    }

    let datosFormulario = new FormData();
    datosFormulario.append('cuestionarioBusqueda', JSON.stringify(busqueda));

    fetch("/api/cuestionarios/buscar", {
      method: 'POST',
      body: datosFormulario,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      }
    }) //Hasta aquí retornaba lo que quería
    .then((response) => {
      return response.json();
    })
    .then((cuestionarios) => {
      armarCuestionarios(cuestionarios);
    });
  }

}

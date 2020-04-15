window.onload = () => {
  let columnaIzquierda = document.querySelector('#columnaIzquierdaCuestionarios'),
      columnaDerecha = document.querySelector('#columnaDerechaCuestionarios');

  fetch('/api/cuestionarios')
  .then((response) => {
    return response.json();
  })
  .then((cuestionarios) => {
    console.log(cuestionarios);
    cuestionarios.forEach((cuestionario, i) => {
      let portada = "";
      console.log(cuestionario);
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
          </div>
          <div class="cuestionario-imagen" style="background-image: url(${portada}); background-size: cover;">

          </div>
        </article>
        `;
      } else {
        columnaDerecha.innerHTML += `
        <article class="cuestionario">
          <div class="cuestionario-info">
            <h4>${cuestionario.titulo}</h4>
            <p>By: <a href="#">${cuestionario.usuario_nombre}</a></p>
          </div>
          <div class="cuestionario-imagen" style="background-image: url(${portada}); background-size: cover;">

          </div>
        </article>
        `;
      }
    });

  })
  .catch((err) => {
    console.log(err);
  });
}

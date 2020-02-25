window.onload = function() {
  let articulos = document.querySelectorAll('article.pregunta.preguntaCarta'),
      seccion = document.getElementById('seccionPreguntasYRespuestas'),
      botonTexto = document.getElementById('inputTexto'),
      botonVof = document.getElementById('inputVOF'),
      id = 1,
      i = 1;

  //A cada pregunta debo agregarle la logica necesaria para poder manipular la información recibida en el backend, por eso hago esto.
  //Para cada artiuclo (pregunta) le agrego un name que va variando de la siguiente forma:
  //respuestaN_I -- con N = numero de pregunta e I = numero de respuesta.

  articulos.forEach(function(articulo) {
    let inputs = articulo.children[1].children[1].children,
        consigna = articulo.children[0].children[1],
        preguntaId = articulo.children[0].children[2];

    consigna.setAttribute("name", "pregunta" + id);
    preguntaId.setAttribute("name", "pregunta_id_" + id);
    articulo.insertAdjacentHTML("beforeend", "<div class='borrarPregunta'><i class='fas fa-times-circle'></i></div>");

    if(inputs.length === 4) {
      articulo.insertAdjacentHTML("afterbegin", "<input type='hidden' name='tipo " + id + "' value='t'>");
      for (var input of inputs) {
        input.setAttribute("name", "respuesta" + id + "_" + i);
        i++;
      }
    } else {
      articulo.insertAdjacentHTML("afterbegin", "<input type='hidden' name='tipo " + id + "' value='v'>");
      for (var input of inputs) {
        input.children[0].setAttribute("name", "respuesta" + id);
        i++;
      }
    }

    id++;
    i = 1;
  });

  botonTexto.addEventListener('click', (e) => {
    seccion.insertAdjacentHTML("beforeend", "<article class='pregunta preguntaCarta'><input type='hidden' name='tipo " + id + "' value='t'><div class='grupoLI'><label for='Pregunta'>Pregunta</label><input type='text' name='pregunta" + id + "' required><input type='hidden' name='pregunta_id_" + id + "' value=''></div><div class='respuestas'><p>Respuestas <span>La primera debe ser la correcta!</span></p><div><input type='text' name='respuesta" + id + "_1' placeholder='Respuesta 1' required><input type='text' name='respuesta" + id + "_2' placeholder='Respuesta 2' required><input type='text' name='respuesta" + id + "_3' placeholder='Respuesta 3' required><input type='text' name='respuesta" + id + "_4' placeholder='Respuesta 4' required></div></div><div class='borrarPregunta'><i class='fas fa-times-circle'></i></div></article>");

    let pregunta = document.querySelector('.pregunta:nth-of-type(' + id + ')');


    setTimeout(function () {
      pregunta.classList.add("aquiTaV");
      setTimeout(function () {
        pregunta.classList.add("aquiTaH");
      }, 200);
    }, 10);

    pregunta.children[3].addEventListener("click", function() {
      setTimeout(function () {
        pregunta.classList.remove("aquiTaV");
        setTimeout(function () {
          pregunta.classList.remove("aquiTaH");
          pregunta.style.display = "none";
          pregunta.children[1].children[1].setAttribute("value", "borrar");

          pregunta.children[2].children[1].children[0].removeAttribute("required");
          pregunta.children[2].children[1].children[1].removeAttribute("required");
          pregunta.children[2].children[1].children[2].removeAttribute("required");
          pregunta.children[2].children[1].children[3].removeAttribute("required");
        }, 200);
      }, 10);
    });

    console.log("Pregunta numero " + id + " agregada.");
    id++;
  });

  botonVof.addEventListener('click', (e) => {
    seccion.insertAdjacentHTML("beforeend", "<article class='pregunta preguntaCarta'><input type='hidden' name='tipo " + id + "' value='v'><div class='grupoLI'><label for='Pregunta'>Pregunta</label><input type='text' name='pregunta" + id +"' required><input type='hidden' name='pregunta_id_" + id + "' value=''></div><div class='respuestas'><p>Respuestas</p><div><div class='inputRadio'><input type='radio' value='1' name='respuesta" + id +"' id='respuestaVerdadero" + id + "' class='radioInput' required> <label for='respuestaVerdadero" + id + "'>Verdadero</label></div><div class='inputRadio'><input type='radio' value='0' name='respuesta" + id +"' id='respuestaFalso" + id + "' class='radioInput' required> <label for='respuestaFalso" + id + "'>Falso</label></div></div></div><div class='borrarPregunta'><i class='fas fa-times-circle'></i></div></article>");

    let pregunta = document.querySelector('.pregunta:nth-of-type(' + id + ')');

    setTimeout(function () {
      pregunta.classList.add("aquiTaV");
      setTimeout(function () {
        pregunta.classList.add("aquiTaH");
      }, 200);
    }, 10);

    pregunta.children[3].addEventListener("click", function() {
      setTimeout(function () {
        pregunta.classList.remove("aquiTaV");
        setTimeout(function () {
          pregunta.classList.remove("aquiTaH");
          pregunta.style.display = "none";
          pregunta.children[1].children[1].setAttribute("value", "borrar");

          pregunta.children[2].children[1].children[0].children[0].removeAttribute("required");
          pregunta.children[2].children[1].children[1].children[0].removeAttribute("required");
        }, 200);
      }, 10);
    });

    console.log("Pregunta numero " + id + " agregada.");
    id++;
  });
}

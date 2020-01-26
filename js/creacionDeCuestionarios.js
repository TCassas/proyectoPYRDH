var seccion = document.getElementById('seccionPreguntasYRespuestas');
var botonTexto = document.getElementById('inputTexto');
var botonVof = document.getElementById('inputVOF');
var id = 1;

botonTexto.addEventListener('click', (e) => {
  seccion.insertAdjacentHTML("beforeend", "<article class='pregunta preguntaCarta'><input type='text' name='tipo " + id + "' value='t' style='display: none;'><div class='grupoLI'><label for='Pregunta'>Pregunta</label><input type='text' name='pregunta" + id + "'></div><div class='respuestas'><p>Respuestas <span>La primera debe ser la correcta!</span></p><div><input type='text' name='respuesta" + id + "'_1' placeholder='Respuesta 1'><input type='text' name='respuesta" + id + "'_2' placeholder='Respuesta 2'><input type='text' name='respuesta" + id + "'_3' placeholder='Respuesta 3'><input type='text' name='respuesta" + id + "'_4' placeholder='Respuesta 4'></div></div></article>");

  var pregunta = document.querySelector('.pregunta:nth-of-type(' + id + ')');
  setTimeout(function () {
    pregunta.classList.add("aquiTaV");
    setTimeout(function () {
      pregunta.classList.add("aquiTaH");
    }, 200);
  }, 10);

  console.log("Pregunta numero " + id + " agregada.");
  id++;
});

botonVof.addEventListener('click', (e) => {
  seccion.insertAdjacentHTML("beforeend", "<article class='pregunta preguntaCarta'><div class='grupoLI'><label for='Pregunta'>Pregunta</label><input type='text' name='pregunta" + id +"'></div><div class='respuestas'><p>Respuestas</p><div><div class='inputRadio'><input type='radio' name='respuesta" + id +"' id='respuestaVerdadero" + id + "' class='radioInput'> <label for='respuestaVerdadero" + id + "'>Verdadero</label></div><div class='inputRadio'><input type='radio' name='respuesta" + id +"' id='respuestaFalso" + id + "' class='radioInput'> <label for='respuestaFalso" + id + "'>Falso</label></div></div></div></article>");

  var pregunta = document.querySelector('.pregunta:nth-of-type(' + id + ')');
  setTimeout(function () {
    pregunta.classList.add("aquiTaV");
    setTimeout(function () {
      pregunta.classList.add("aquiTaH");
    }, 200);
  }, 10);

  console.log("Pregunta numero " + id + " agregada.");
  id++;
});

function borrarPregunta(id) {
  var pregunta = document.querySelector('.preguntaYRespuesta:nth-of-type(' + id + ')');

  pregunta.style.display = "none";
}

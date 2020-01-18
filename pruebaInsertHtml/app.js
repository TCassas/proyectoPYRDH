var seccion = document.getElementById('seccion');
var botonTexto = document.getElementById('inputTexto');
var botonVof = document.getElementById('inputVOF');
var id = 1;

botonTexto.addEventListener('click', (e) => {
  seccion.insertAdjacentHTML("beforeend", "<input type='text' name='tipo " + id + "' value='t' style='display: none;'><div class='preguntaYRespuesta'><div class='pregunta'><div class='consignaPregunta'><label for=''>Pregunta:</label><input type='text' name='pregunta " + id + "' value='' placeholder='Escribí aquí tu pregunta'></div><div class='funcionesPregunta'><button type='button' name='button'><ion-icon name='remove-circle'></ion-icon></button></div></div><div class='unasRespuestas'><label for='>Respuestas <span class='textoChiquito'>(¡La primera debe ser la correcta!)</span></label><div class='formularioInput'><input type='text' name='respuesta" + id + "_1' value='' placeholder='Respuesta 1'></div><div class='formularioInput'><input type='text' name='respuesta" + id + "_2' value='' placeholder='Respuesta 2'></div><div class='formularioInput'><input type='text' name='respuesta" + id + "_3' value='' placeholder='Respuesta 3'></div><div class='formularioInput'><input type='text' name='respuesta" + id + "_4' value='' placeholder='Respuesta 4'></div></div><hr></div><br>");

  console.log("Pregunta numero " + id + " agregada.");
  id++;
});

botonVof.addEventListener('click', (e) => {
  seccion.insertAdjacentHTML("beforeend", "<div class='preguntaYRespuesta'><div class='pregunta'><div class='consignaPregunta'><label for='respuestaNumerica'>Pregunta #<?= $i + 2?> <span class='textoChiquito'>(Verdadero o falso)</span></label><input type='text' name=' value=' placeholder='Escribí aquí tu pregunta'></div><div class='funcionesPregunta'><button type='button' name='button'><ion-icon name='remove-circle'></ion-icon></button></div></div><div class='unasRespuestas'><div class='formularioInput'><input type='radio' name='respuestaVoF' value='verdadero'> Verdadero</div><div class='formularioInput'><input type='radio' name='respuestaVoF' value='falso'> Falso</div></div><hr></div>");
});

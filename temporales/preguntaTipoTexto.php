<div class="pregunta">
  <div class="consignaPregunta">
    <label for="">Pregunta #<?= $i + 1?>: </label>
    <input type="text" name="pregunta" value="" placeholder="Escribí aquí tu pregunta">
  </div>
  <div class="funcionesPregunta">
    <button type="button" name="button">
      <ion-icon name="remove-circle"></ion-icon>
    </button>
  </div>
</div>
<div class="unasRespuestas">
  <label for="">Respuestas <span class="textoChiquito">(¡La primera debe ser la correcta!)</span></label>
  <div class="formularioInput">
    <input type="text" name="respuesta1" value="" placeholder="Respuesta 1">
  </div>
  <div class="formularioInput">
    <input type="text" name="respuesta2" value="" placeholder="Respuesta 2">
  </div>
  <div class="formularioInput">
    <input type="text" name="respuesta3" value="" placeholder="Respuesta 3">
  </div>
  <div class="formularioInput">
    <input type="text" name="respuesta4" value="" placeholder="Respuesta 4">
  </div>
</div>
<hr>

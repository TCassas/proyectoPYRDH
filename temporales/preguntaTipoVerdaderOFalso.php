<div class="preguntaYRespuesta">  
  <div class="pregunta">
    <div class="consignaPregunta">
      <label for="respuestaNumerica">Pregunta #<?= $i + 2?> <span class="textoChiquito">(Verdadero o falso)</span></label>
      <input type="text" name="" value="" placeholder="Escribí aquí tu pregunta">
    </div>
    <div class="funcionesPregunta">
      <button type="button" name="button">
        <ion-icon name="remove-circle"></ion-icon>
      </button>
    </div>
  </div>
  <div class="unasRespuestas">
    <div class="formularioInput">
      <input type="radio" name="respuestaVoF" value="verdadero"> Verdadero
    </div>
    <div class="formularioInput">
      <input type="radio" name="respuestaVoF" value="falso"> Falso
    </div>
  </div>
</div>

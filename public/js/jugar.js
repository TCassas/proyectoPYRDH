window.onload = () => {
  let url = window.location.href.split('/'),
      consigna = document.querySelector('#pregunta'),
      responder = document.querySelector('#responder'),
      seccionRespuestas = document.querySelector('#preguntas'),
      seccionDerecha = document.querySelector('#seccionDerechaPreguntaTexto'),
      cronometro = document.querySelector('.cronometro p'),
      id = url[5];

  fetch('/api/cuestionarios/' + id)
  .then((response) => {
    return response.json();
  })
  .then((preguntas) => {


    //Desordeno las preguntas en un arreglo de objetos literales, mas facil de manipular. Creo las variables necesarias para la logica del juego
    let preguntasArray = ordenarPreguntas(preguntas),
        preguntaNumero = 0,
        aciertos = 0,
        tiempo = 25,
        contador = setInterval(iniciarCronometro, 1000),
        seJuega = true;

    //Seteo la primera pregunta y la variable donde se guardara la respuesta parcial del jugador
    setPregunta(preguntasArray[preguntaNumero]);
    let respuestaFinal = "";

    let respuestas = document.querySelectorAll('.respuestaOpcion');

    //Cada vez que se le da al boton, carga la siguiente pregunta
    responder.addEventListener('click', (e) => {
      if(seJuega) {
        if(respuestaFinal == preguntasArray[preguntaNumero].respuestaCorrecta) {
          aciertos++;
          console.log("Respuesta correcta!");
        } else {
          console.log("Respuesta incorrecta :o");
        }

        preguntaNumero++;
        if(preguntaNumero < preguntasArray.length) {
          setPregunta(preguntasArray[preguntaNumero]);

          let respuestas = document.querySelectorAll('.respuestaOpcion');

          for(let respuesta of respuestas) {
            respuesta.addEventListener('click', () => {
              respuestaFinal = respuesta.children[0].innerText;
            });
          }
        } else {
          seJuega = false;
          clearInterval(contador);
        }

        tiempo = 25;
      }
    });

    //Poder seleccionar o deseleccionar una respuesta
    for(let respuesta of respuestas) {
      respuesta.addEventListener('click', (e) => {
        respuestaFinal = respuesta.children[0].innerText;

        for(let respuesta of respuestas) {
          if(respuesta.classList.contains("opcionSeleccionada")) {
            respuesta.classList.remove("opcionSeleccionada");
          }
        }

        respuesta.classList.add("opcionSeleccionada");

        e.stopPropagation();
      });
    }

    //Si se presiona fuera de las preguntas teniendo una seleccionada, se deselecciona
    seccionDerecha.addEventListener('click', (e) => {
      for(let respuesta of respuestas) {
        if(respuesta.classList.contains("opcionSeleccionada")) {
          respuesta.classList.remove("opcionSeleccionada");
          respuestaFinal = "";
        }
      }
    });

    //Funcion que llama la variable "contador" para iniciar el cronometro
    function iniciarCronometro() {
      tiempo--;
      cronometro.innerText = tiempo + " seg";

      console.log(cronometro);

      if(tiempo == 0) {
        responder.click();
        tiempo = 25;
      }
    }
  })
  .catch((err) => {
    console.log(err);
  });

  //Toma las preguntas traidas por la API y las combierte en objetos literales y los pone en un array
  function ordenarPreguntas(data) {
    let preguntas = [];

    for(let pregunta of data[0]) {
      preguntas.push({
        consigna: pregunta.consigna,
        respuestaCorrecta: pregunta.respuesta_correcta,
        segundaRespuesta: pregunta.segunda_respuesta,
        terceraRespuesta: pregunta.tercera_respuesta,
        cuartaRespuesta: pregunta.cuarta_respuesta
      });
    }

    for(let pregunta of data[1]) {
      preguntas.push({
        consigna: pregunta.consigna,
        respuestaCorrecta: (pregunta.respuesta_correcta == 0) ? "Falso" : "Verdadero"
      });
    }



    return shuffle(preguntas);
  }

  //Desordena el array devuelto por ordenarPreguntas
  function shuffle(preguntas) {
    let j, x, i;

    for (i = preguntas.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = preguntas[i];
        preguntas[i] = preguntas[j];
        preguntas[j] = x;
    }

    return preguntas;
  }

  //Dependiendo de tener 2 o 4 respuestas, crea en el dom tanto una pregunta de texto o de vof llamando a las correspondientes funciones ↓↓
  function setPregunta(pregunta) {
    if(Object.keys(pregunta).length == 5) {
      setPreguntaTexto(pregunta);
    } else {
      setPreguntaVof(pregunta);
    }
  }

  //Las siguientes 2 funciones, preparan el dom para cada pregunta, en cuanto a las preguntas, cada vez que se llama borra las que había anteriormente
  function setPreguntaTexto(pregunta) {
    let orden = shuffle([0, 1, 2, 3]);

    consigna.innerText = pregunta.consigna;

    seccionRespuestas.innerHTML = ``;

    for(let i = 0; i < 4; i++) {
      switch (orden[i]) {
        case 0:
          seccionRespuestas.innerHTML += `
          <article class="respuestaOpcion">
            <p>${pregunta.respuestaCorrecta}</p>
          </article>
          `
          break;
        case 1:
          seccionRespuestas.innerHTML += `
          <article class="respuestaOpcion">
            <p>${pregunta.segundaRespuesta}</p>
          </article>
          `
          break;
        case 2:
          seccionRespuestas.innerHTML += `
          <article class="respuestaOpcion">
            <p>${pregunta.terceraRespuesta}</p>
          </article>
          `
          break;
        case 3:
          seccionRespuestas.innerHTML += `
          <article class="respuestaOpcion">
            <p>${pregunta.cuartaRespuesta}</p>
          </article>
          `
          break;
      }
    }
  }
  function setPreguntaVof(pregunta) {
    console.log(pregunta);

    consigna.innerText = pregunta.consigna;

    seccionRespuestas.innerHTML = ``;

    seccionRespuestas.innerHTML += `
    <article class="respuestaOpcion">
      <p>Verdadero</p>
    </article>
    <article class="respuestaOpcion">
      <p>Falso</p>
    </article>
    `
  }
}

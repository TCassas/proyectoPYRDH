<?php
  declare(strict_types = 1);

  class Pregunta4Respuestas {
    private $respuestas;

    public function __construct($consigna, $respuestas) {
      $this->consgina = $consigna;
      $this->respuestas = $respuestas;
    };

    abstract public function responderPregunta($respuestaUsuario) {};
  }
?>

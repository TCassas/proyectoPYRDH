<?php
  declare(strict_types = 1);

  class Pregunta {
    private $consigna;
    private $respuestas;

    public function __construct($tipo, $consigna, $respuestas) {
      $this->tipo = $tipo;
      $this->consigna = $consigna;
      $this->respuestas = $respuestas;
    }

    public function setTipo($tipo) {
      $this->tipo = $tipo;
    }

    public function setConsigna($consigna) {
      $this->consigna = $consigna;
    }

    public function setRespuesta($respuesta, $i) {
      $this->respuestas[$i] = $respuesta;
    }

    public function getTipo() {
      return $this->tipo;
    }

    public function getConsigna() {
      return $this->consigna;
    }

    public function getRespuestas() {
      return $this->respuestas;
    }
  }
?>

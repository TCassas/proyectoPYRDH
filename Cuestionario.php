<?php
  declare(strict_types = 1);

  class Cuestionario {
    private $titulo;
    private $descripcion;
    private $img;
    private $genero;
    private $preguntas;

    public function __construct($titulo, $descripcion, $img, $genero, $preguntas) {
      $this->nombre = $titulo;
      $this->descripcion = $descripcion;
      $this->img = $img;
      $this->genero = $genero;
      $this->preguntas = $preguntas;
    }

    private function encriptarContrasenia($contrasenia) {
      return password_hash($contrasenia, PASSWORD_DEFAULT);
    }

    public function setNombre(String $nombre) {
      $this->nombre = $nombre;
    }

    public function setMail(String $mail) {
      $this->mail = $mail;
    }

    public function setContrasenia(String $contrasenia) {
      $this->contrasenia = $this->encriptarContrasenia($contrasenia);
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function getMail() {
      return $this->mail;
    }

    public function getContrasenia() {
      return $this->contrasenia;
    }
  }
?>

<?php
  declare(strict_types = 1);

  class Usuario {
    private $id;
    private $nombre;
    private $mail;
    private $contrasenia;
    private $cuestionarios;
    private $cuestionariosJugados;
  }

  private function encriptarContrasenia() {

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

  public function getCuestionarios(BaseDeDatos $db) {
    $cuestionarios = [];

    $query = $db->prepare("SELECT * FROM cuestionarios INNER JOIN usuarios ON usuarios.id = creador");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    forEach($result as $cuestionario) {
      $cuestionarios[] = new Cuestionario();
    }
  }
?>

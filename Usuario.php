<?php
  declare(strict_types = 1);

  class Usuario {
    private $nombre;
    private $mail;
    private $contrasenia;
    private $cuestionarios;
    private $cuestionariosJugados;

    public function __construct($nombre, $mail, $contrasenia) {
      $this->nombre = $nombre;
      $this->mail = $mail;
      $this->contrasenia = $this->encriptarContrasenia($contrasenia);
    }

    public function guardarUsuario($db) {
      // try {
      //   $query = $db->prepare("INSERT INTO usuarios VALUES (default, :nombre, :mail, :mail, :fecha)");
      //   $query->bindValue(":nombre", $this->nombre);
      //   $query->bindValue(":contrasenia", $this->contrasenia);
      //   $query->bindValue(":mail", $this->mail);
      //   $query->bindValue(":fecha", date("Y-m-d"));
      //   $query->execute();
      //
      //   return 1;
      // } catch (\Exception $e) {
      //   return "Error!: " . $e->getMessage();
      // }
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

    public function getCuestionarios() {
      // $cuestionarios = [];
      //
      // $query = $db->prepare("SELECT * FROM cuestionarios INNER JOIN usuarios ON creador = $_SESSION["id"]");
      // $query->execute();
      // $result = $query->fetchAll(PDO::FETCH_ASSOC);
      //
      // forEach($result as $cuestionario) {
      //   $cuestionarios[] = new Cuestionario($cuestionario["jugador_id"], $cuestionario["titulo"], $cuestionario["categoria_id"], $cuestionario["portada"], $cuestionario["fechaDeCreacion"], $cuestionario["puntuacion"]);
      // }
      //
      // return $cuestionarios;
    }

    public function getCuestionariosJugados() {
    //   $cuestionarios = [];
    //
    //   $query = $db->prepare("SELECT * FROM cuestionarios INNER JOIN cuestionarioJugados ON cuestionarios-id = cuestionario_id INNER JOIN usuarios ON usuarios.id = jugador_id HAVING usuarios.id = $_SESSION['id']);
    //   $query->execute();
    //   $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //
    //   forEach($result as $cuestionario) {
    //     $cuestionarios[] = new Cuestionario($cuestionario["jugador_id"], $cuestionario["titulo"], $cuestionario["categoria_id"], $cuestionario["portada"], $cuestionario["fechaDeCreacion"], $cuestionario["puntuacion"]);
    //   }
    //
    //   return $cuestionarios;
    }

    public function modificarInfoDeCuenta(String $campo, String $valor, $db) {
      // $query = $db->prepare("UPDATE usuarios SET $campo = $valor WHERE usuarios.id = $_SESSION['id']");
      // $query->execute();
    }
  }
?>

<?php
  try {
    $db = new PDO(
      "mysql:host=127.0.0.1;dbname=proyectopyrdh;port3306",
      "root",
      "root"
    );

    return $db;
  } catch (PDOexception $exception) {
    return $exception->getMessage();
  }
?>

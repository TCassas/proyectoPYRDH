<?php
  require("pdo.php");

  $query = $db->prepare("SELECT * FROM categorias ORDER BY nombre");
  $query->execute();
  $generos = $query->fetchAll(PDO::FETCH_ASSOC);

  forEach($generos as $genero) { ?>
    <option value="<?= $genero["id"] ?>"><?= $genero["nombre"] ?></option>
  <?php }
?>

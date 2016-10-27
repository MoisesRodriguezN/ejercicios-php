<?php
  session_start();

  $codigo = $_POST["codigo"];
  $producto = $_SESSION['catalogo'][$codigo];
  ?>

  <h1><?= $producto['nombre']?></h1>
  <img src="<?= $producto['imagen']?>"/><br>
  Precio: <?= $producto['precio']?>€<br>
  <?= $producto['detalle']?>
 

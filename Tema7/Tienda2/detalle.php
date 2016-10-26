<?php
  include 'vars.php';
  
  $codigo = $_POST["codigo"];
  $producto = $catalogo[$codigo];
  ?>

  <h1><?= $producto['nombre']?></h1>
  <img src="<?= $producto['imagen']?>"/><br>
  Precio: <?= $producto['precio']?>€<br>
 
<?php
 
?>

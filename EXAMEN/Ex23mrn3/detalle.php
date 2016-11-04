<?php
/*Moisés Rodríguez Naranjo 
   * 28-10-2016 */
  session_start();
  $codigo = $_POST["codigo"];
  $producto = $_SESSION['catalogo'][$codigo];
  ?>

  <h1><?= $producto['nombre']?></h1>
  <img src="<?= $producto['imagen']?>"/><br>
  Precio: <?= $producto['precio']?>€<br>
  <?= $producto['detalle']?>
 <form action="index.php#<?= $codigo?>" method="post"> <!--Formulario de compra-->
              <input type="number" min="1" name="cantidad" value="1" required="true"/>
              <br><br>
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="comprar"/>
              <input type="submit"  value="Comprar"/>
    </form>
  <form action="index.php" method="post">  
    <input type="submit" value="Volver"/>
  </form>
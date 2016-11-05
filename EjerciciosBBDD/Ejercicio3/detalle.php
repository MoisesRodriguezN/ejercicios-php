<?php
  session_start();
  $codigo = $_POST["codigo"];
  $producto = $_SESSION['catalogo'][$codigo];
  ?>
<?php
  try {
      $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
  } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
  }
    $codigo = $_POST["codigo"];
    $consulta = $conexion->query("SELECT * FROM producto WHERE codProducto = '$codigo'");
    $producto = $consulta->fetchObject();
?>

  <h1><?= $producto->nombre?></h1>
  <img src="<?= $producto->imagen?>"/><br>
  Precio: <?= $producto->precio?>€<br>
  <?= $producto->detalle?>
 
  <form action="index.php" method="post">  
    <input type="submit" value="Volver"/>
  </form>
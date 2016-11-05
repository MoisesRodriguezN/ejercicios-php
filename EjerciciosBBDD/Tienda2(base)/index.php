<?php
session_start();
?>
<!DOCTYPE html>
 
<html>
  <head>
    <title>Tienda de Móviles</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css.css"/>
  </head>
  <body>    
      <div id="contenedor">
          <div id="compraProducto">
              <div id="productos">
      <h1>Tienda de smartphones</h1>
    <?php
      try {
          $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
      } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
      }
     
      $consulta = $conexion->query("SELECT * FROM producto ORDER BY Nombre ASC");
        
          while ($producto = $consulta->fetchObject()) {
          ?>
          <div class="productoIndividual">        
          <a id="<?= $producto->codProducto?>">
            <img src="<?= $producto->imagen?>"/><br>
            <?= $producto->nombre?><br>
            Precio: <?= $producto->precio?>€<br>
            <form action="index.php#<?= $producto->codProducto?>" method="post"> <!--Formulario de compra-->
              <input type="number" min="1" name="cantidad" value="1" required="true"/>
              <br><br>
              <input type="hidden" name="codigo" value="<?= $producto->codProducto?>"/>
              <input type="hidden" name="accion" value="comprar"/>
              <input type="submit"  value="Comprar"/>
            </form>
            <form action="detalle.php" method="post">  <!--Formulario de detalles-->
              <input type="hidden" name="codigo" value="<?= $producto->codProduto?>"/>
              <input type="submit"  value="Detalle"/>
            </form>
          </div>
          <?php
        }
        ?>
        </div>
        <div id="carrito">
          
        <?php
      //recuperamos valores del formulario
      $codigo = $_POST["codigo"];
      $accion = $_POST["accion"];
      $cantidad = $_POST["cantidad"];
      
      if (!isset($_SESSION["carrito"])){
        //Primera visita
        $_SESSION["carrito"] = array(
            "cod1" => 0, //Código => Cantidad
            "cod2" => 0,
            "cod3" => 0,
            "cod4" => 0
        );
      }
      //Si mando por formulario acción comprar, 
      if($accion == "comprar" && isset($cantidad) && is_numeric($cantidad) && $cantidad > 0){
        $_SESSION["carrito"][$codigo]+=$cantidad;
      }

      if($accion == "eliminar"){
        $_SESSION["carrito"][$codigo] = 0;
      }
      
      if($accion == "eliminarTodo"){
        foreach ($_SESSION["carrito"] as $codigo => $cantidad) {
          $_SESSION["carrito"][$codigo] = 0;
        }
      }
     
      // Mostrar carrito
      $vacio = true;
      $total = 0;
      echo "<h1> CARRITO DE LA COMPRA</h1>";
      ?>
      <div class="divIcon">
            <img class="icon" src="imagenes/carrito.png">
      </div>
      <?php
      foreach ($_SESSION["carrito"] as $codigo => $cantidad) {
        if($cantidad > 0){
          $vacio = false;
          $producto = $_SESSION['catalogo'][$codigo];
          $total += $producto['precio']*$cantidad;
          ?>

            <a id="<?=compra.$codigo?>">
            <img src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br>
            Cantidad: <?= $cantidad?><br>
           
            <form action="index.php" method="post">  
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="eliminar"/>
              <input type="submit" value="Eliminar"/>
            </form>

          <?php
        }   
      }
     
      if($vacio){
          echo " <h3> El carrito está vacio </h3>";
      }else{
        echo "<br><br>total: ", $total, "€";
        ?>
          
       <?php
     }
    ?>
            </div>
          </div>
      </div>
  </body>
</html>
<?php
session_start();
/*include 'detalle.php';*/
if(!isset($_SESSION['catalogo'])){  $_SESSION['catalogo'] = array (
        "cod1" => array( "nombre" => "Camiseta Selección Española", "precio" => 68, "imagen" => "imagenes/espania.jpg", "detalle" => "Año: 2016-2017", "stock" => 5),
        "cod2" => array( "nombre" => "Camiseta Selección Rusa", "precio" => 68, "imagen" => "imagenes/rusia.jpg", "detalle" => "Año: 2016-2017", "stock" => 5),
        "cod3" => array( "nombre" => "Camiseta Real Madrid C.F.", "precio" => 75, "imagen" => "imagenes/madrid.jpg", "detalle" => "Año: 2016-2017", "stock" => 5),
        "cod4" => array( "nombre" => "Camiseta Bayern Munich", "precio" => 75, "imagen" => "imagenes/bayern.jpg" , "detalle" => "Año: 2016-2017",  "stock" => 0)
        );
}
  


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
                  <h1>PRODUCTOS</h1>
    <?php
        //recuperamos valores del formulario
      $codigo = $_POST["codigo"];
      $accion = $_POST["accion"];
      $cantidad = $_POST["cantidad"];
      $codDes = $_POST["codigoDescuento"];
      $comprobarStock = $_SESSION['catalogo'][$codigo];
      
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
      if($comprobarStock["stock"] == 0 && $accion == "comprar"){
          
      }else{
          
     
      if($accion == "comprar" && isset($cantidad) && is_numeric($cantidad) && $cantidad > 0){
        $_SESSION["carrito"][$codigo]+=$cantidad;
        $_SESSION['catalogo'][$codigo]["stock"]-=$cantidad;
      }else if($accion == "actualizar"){
        $_SESSION["carrito"][$codigo]=$cantidad;
      }
      
      if($accion == "eliminar"){
        $_SESSION["carrito"][$codigo] = 0;
        
      }
      } 
      if($accion == "eliminarTodo"){
        foreach ($_SESSION["carrito"] as $codigo => $cantidad) {
          $_SESSION["carrito"][$codigo] = 0;
        }
      }
     
        foreach ($_SESSION['catalogo'] as $codigoP => $producto) {
          ?>
          <div class="productoIndividual">        
          <a id="<?= $codigoP?>">
            <img src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br>
            <?php
            echo "Stock: ", $producto['stock'];
                if($producto['stock']>0){
                    echo "<p style=\"color: green;\">En Stock</p>";
                } else {
                    echo "<p style=\"color: red;\">No disponible</p>";
                }
                
                if($accion == "comprar" && $producto['stock'] == 0 && $codigoP == $codigo){
                  echo "No se puede comprar el producto";
                }
            ?>
            <form action="index.php#<?= $codigoP?>" method="post"> <!--Formulario de compra-->
              <input type="number" min="1" max="<?=$producto['stock']?>" name="cantidad" value="1" required="true"/>
              <br><br>
              <input type="hidden" name="codigo" value="<?= $codigoP?>"/>
              <input type="hidden" name="accion" value="comprar"/>
              <input type="submit"  value="Comprar"/>
            </form>
            <form action="detalle.php" method="post">  <!--Formulario de detalles-->
              <input type="hidden" name="codigo" value="<?= $codigoP?>"/>
              <input type="submit"  value="Detalle"/>
            </form>
          </div>
          <?php
        }
        ?>
        </div>
        <div id="carrito">
          
        <?php
      
      // Mostrar carrito
      $vacio = true;
      $total = 0;
      ?>
            <br>
            <h1>CARRITO DE LA COMPRA</h1>
            <img class="icon" src="imagenes/carrito.png"><br><br>
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
            
            <form action="index.php#<?=compra.$codigo?>" method="post">  
              Cantidad: <input type="number" min="0" name="cantidad" value="<?= $cantidad?>" required="true"/> <br>
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="actualizar"/>
              <input type="submit" value="Actualizar"/>
            </form>
            <form action="index.php" method="post">  
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="eliminar"/>
              <input type="submit" value="Eliminar"/>
            </form>

          <?php
        }   
      }
     
      if($vacio){
          echo "<h2>El carrito está vacío</h2>";
      }else{
      ?>
            <br>
            <form action="index.php" method="post">
            Código de Descuento: <input type="text" name="codigoDescuento"/><!--XC96CX-->
            <input type="submit" value="Aplicar"/>
            </form>
      <?php
            if($codDes == "XC96CX"){
                echo "<br><br>total: ", $total*0.8, "€ ";
            } else {
                echo "<br><br>total: ", $total, "€";
            }
        ?>
          <form action="index.php" method="post">  
            <input type="hidden" name="accion" value="eliminarTodo"/>
          <input type="submit"  value="Vaciar carrito"/>
          </form>
       <?php
     }
    ?>
            </div>
          </div>
      </div>
  </body>
</html>
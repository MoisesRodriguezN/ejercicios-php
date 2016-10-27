<?php
session_start();
include 'vars.php';
?>
<!DOCTYPE html>
 
<html>
  <head>
    <title>Tienda de Móviles</title>
    <meta charset="UTF-8">
  </head>
  <body>    
    <table style="border: 2px; margin: 0px 30px 0px 30px;">
      <tr>
        <td>

    <?php
    
        foreach ($catalogo as $codigo => $producto) {
          ?>
            <img src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br>
            <form action="index.php" method="post"> <!--Formulario de compra-->
              <input type="number" min="1" name="cantidad" value="1" required="true"/>
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="comprar"/>
              <input type="submit"  value="Comprar"/>
            </form>
            <form action="detalle.php" method="post">  <!--Formulario de detalles-->
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="submit"  value="Detalle"/>
            </form>
          <?php
        }
        ?>
        </td>
        <td>
          
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
      }else if($accion == "actualizar"){
        $_SESSION["carrito"][$codigo]=$cantidad;
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
      foreach ($_SESSION["carrito"] as $codigo => $cantidad) {
        if($cantidad > 0){
          $vacio = false;
          $producto = $catalogo[$codigo];
          $total += $producto['precio']*$cantidad;
          ?>
            <img src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br>
            <form action="index.php" method="post">  
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
          echo "<h2>Carrito vacio</h2>";
      }else{
        echo "<br><br>total: ", $total, "€";
        ?>
          <form action="index.php" method="post">  
            <input type="hidden" name="accion" value="eliminarTodo"/>
          <input type="submit"  value="Vaciar carrito"/>
          </form>
       <?php
     }
    ?>
        </td>
      </tr>
    </table>
  </body>
</html>
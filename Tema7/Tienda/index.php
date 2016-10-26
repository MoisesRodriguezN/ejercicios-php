<?php
session_start();
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
      $catalogo = array (
        "cod1" => array( "nombre" => "Samsung galaxy s7", "precio" => 720, "imagen" => "imagenes/galaxy7.png"),
        "cod2" => array( "nombre" => "LG G4", "precio" => 430, "imagen" => "imagenes/lg4.png"),
        "cod3" => array( "nombre" => "HUAWEI P8", "precio" => 350, "imagen" => "imagenes/huaweip8.png"),
        "cod4" => array( "nombre" => "SAMSUNGJ5", "precio" => 250, "imagen" => "imagenes/samsungj5.png")
        );
      
        foreach ($catalogo as $codigo => $producto) {
          ?>
            <img src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br>
            <form action="index.php" method="post">  
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="comprar"/>
              <input type="submit"  value="Comprar"/>
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
      
      if (!isset($_SESSION["carrito"])){
        //Primera visita
        $_SESSION["carrito"] = array(
            "cod1" => 0,
            "cod2" => 0,
            "cod3" => 0,
            "cod4" => 0
        );
      }
      
     if($accion == "comprar"){
       $_SESSION["carrito"][$codigo]++;
     }
     
     if($accion == "eliminar"){
       $_SESSION["carrito"][$codigo] = 0;
     }
     
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
            Cantidad: <?= $cantidad?><br>
            <form action="index.php" method="post">  
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="accion" value="eliminar"/>
              <input type="submit"  value="Eliminar"/>
            </form>
            
          <?php
       }   
     }
     
     if($vacio){
         echo "<h2>Carrito vacio</h2>";
     }else{
       echo "<br><br>total: ", $total, "€";
     }
    ?>
        </td>
      </tr>
    </table>
  </body>
</html>
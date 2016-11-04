<?php
/*Moisés Rodríguez Naranjo 
   * 28-10-2016 */
session_start();

$_SESSION['zonasEnvio'] = array (
  "cod1" => "España",
  "cod2" => "Europa",
  "cod3" => "Resto del mundo"
  );

$_SESSION['costesEnvio'] = array (
  "España" => 9,
  "Europa" => 14,
  "Resto del mundo" => 21
  );
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Datos de la compra</title>
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
  </head>
  <body>
    <?php
    $codEnvio = $_POST['codEnvio'];
    if (!isset($codEnvio)) {
      $codEnvio = "España";
    }else{
      $envioAceptado = true;
    }
    // Mostrar carrito
      $vacio = true;
      $final = false;
      $total = 0;
      echo "<h1> CARRITO DE LA COMPRA</h1>";
      echo "<h2> Envio y desglose</h2>";
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
            <img class="imgfinal"src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br>
            Cantidad: <?= $cantidad?><br>

          <?php
        }   
      }
     
      if($vacio){
          echo " <h3> El carrito está vacio </h3>";
      }else{
        echo "-------------------------------------";
        echo "<br>total: ", $total, "€";
        echo "<br>-------------------------------------";
        ?>
            <h2>Selecciona la zona de envio</h2>
          <form action="comprar.php" method="post">
          <select name="codEnvio">
           
            <?php
 
            foreach ($_SESSION['zonasEnvio'] as $codigo => $zona) {
            ?>
            <option <?= $codEnvio == $codigo ? "selected" : "" ?> value="<?= $codigo ?>"><?= $zona ?></option>
            
            <?php
            }
            
            ?>
            
            <input type="submit" value="Aplicar"/>
          </select> 
       </form>
       <?php
      $zonaEnvio = $_SESSION['zonasEnvio'][$codEnvio];
       if($envioAceptado){
         echo "Total: ", $total, "<br>";
       }
       if($envioAceptado && $total > 60){
          echo "Gastos de envio: ", "0€<br>";
          $_SESSION['costesEnvio'][$zonaEnvio]="";
          $final = true;
       }else if($envioAceptado && $total <= 60){
          echo "Gastos de envio: ", $_SESSION['costesEnvio'][$zonaEnvio], "€<br>"; 
          $final = true;
       }
       
       if($envioAceptado && $total > 200){
         $descuento = $total * 0.05;
         echo "<br>Descuento: 5% ", "(", $descuento,"€)<br>";
         $final = true;
       }
      
       if($envioAceptado && $final){
         echo"Total a pagar: ", ($total-$descuento)+$_SESSION['costesEnvio'][$zonaEnvio], "€";
       }
     }
    ?>
  </body>

</html>
<?php
session_start();
$_SESSION['categoria'] = array (
  "cod1" => "Android",
  "cod2" => "Windows Phone",
  "cod3" => "Iphone"
  );

if (!isset($_SESSION["descuentos"])){
  $_SESSION['descuentos'] = array (
    "DESCUENTO5" => 5,
    "DESCUENTO10" => 10,
    "DESCUENTO50" => 50,
    );
}

if (!isset($_SESSION["catalogo"])){
  $_SESSION['catalogo'] = array (
    "cod1" => array( "nombre" => "Samsung galaxy s7", "precio" => 720, "imagen" => "imagenes/galaxy7.png", "detalle" => "4GB RAM 32GB INTERNA CPU QUAD CORE 2.2GHZ", "categoria" => "cod1", "stock" => 4),
    "cod2" => array( "nombre" => "LG G4", "precio" => 430, "imagen" => "imagenes/lg4.png", "detalle" => "3GB RAM 16GB INTERNA CPU QUAD CORE 1.8GHZ", "categoria" => "cod1","stock" => 4),
    "cod3" => array( "nombre" => "HUAWEI P8", "precio" => 350, "imagen" => "imagenes/huaweip8.png", "detalle" => "2GB RAM 16GB INTERNA CPU QUAD CORE 1.6GHZ", "categoria" => "cod2","stock" => 4),
    "cod4" => array( "nombre" => "SAMSUNGJ5", "precio" => 250, "imagen" => "imagenes/samsungj5.png" , "detalle" => "1GB RAM 16GB INTERNA CPU QUAD CORE 1.6GHZ", "categoria" => "cod3","stock" => 4)
    );
}

// Recuperamos valors del formulario del filtro de categorias
$codCategoria = $_POST['codCategoria'];
if (!isset($codCategoria)) {
  $codCategoria = "todas";
}
            
//recuperamos valores del formulario de compra y del carrito
$codigo = $_POST["codigo"];
$accion = $_POST["accion"];
$cantidad = $_POST["cantidad"];
$descuento = $_POST["descuento"];

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
  $_SESSION["catalogo"][$codigo]["stock"]-=$cantidad;
}else if($accion == "actualizar"){
  $cantidadAnt = $_SESSION["carrito"][$codigo];
  $_SESSION["carrito"][$codigo]=$cantidad;
  if($cantidad > $cantidadAnt){
    $_SESSION["catalogo"][$codigo]["stock"]-=$cantidad-$cantidadAnt;
  }else{
    $_SESSION["catalogo"][$codigo]["stock"]+=$$cantidadAnt-$cantidad;
  }
}

if($accion == "eliminar"){
  $cantidadAnt = $_SESSION["carrito"][$codigo];
  $_SESSION["catalogo"][$codigo]["stock"]+=$cantidadAnt;
  $_SESSION["carrito"][$codigo] = 0;
}

if($accion == "eliminarTodo"){
  foreach ($_SESSION["carrito"] as $codigo => $cantidad) {
    $cantidadAnt = $_SESSION["carrito"][$codigo];
    $_SESSION["catalogo"][$codigo]["stock"]+=$cantidadAnt;
    $_SESSION["carrito"][$codigo] = 0;
  }
}

if($accion == "aplicarDescuento"){
  $_SESSION["descuentoAplicado"] = $descuento;
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
      <h1>Tienda de smartphones</h1>
       <form action="index.php" method="post">
          <select name="codCategoria">
            <option <?= !isset($codCategoria) ? "selected" : "" ?> value="todas">Todas</option>
            <?php
 
            foreach ($_SESSION['categoria'] as $codigo => $nombre) {
            ?>
            <option <?= $codCategoria == $codigo ? "selected" : "" ?> value="<?= $codigo ?>"><?= $nombre ?></option>
            
            <?php
            }
            ?>
            
            <input type="submit" value="Filtrar"/>
          </select> 
       </form>
    <?php
    
        
        
        // Mostrar productos
        foreach ($_SESSION['catalogo'] as $codigo => $producto) {
          if(!isset($codCategoria) || $producto['categoria'] == $codCategoria || $codCategoria == "todas"){
            
          
          ?>
          <div class="productoIndividual">        
          <a id="<?= $codigo?>">
            <img src="<?= $producto['imagen']?>"/><br>
            <?= $producto['nombre']?><br>
            Precio: <?= $producto['precio']?>€<br> 
            <?php
              If($producto['stock'] <= 0){
                echo "<span style='color: red'>Sin stock</span>";
              }else{
                echo "<span style='color: green'>En stock (".$producto['stock'].")</span>";
              }
              echo "<br>";
              
              if($producto['stock'] != 0){
            ?>
            
            <form action="index.php#<?= $codigo?>" method="post"> <!--Formulario de compra-->
              <input type="number" min="1" max="<?= $producto['stock'] ?>" name="cantidad" value="1" required="true"/>
              <br><br>
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>
              <input type="hidden" name="accion" value="comprar"/>
              <input type="submit"  value="Comprar"/>
            </form>
            <?php
              }
            ?>
            <form action="detalle.php" method="post">  <!--Formulario de detalles-->
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="submit"  value="Detalle"/>
            </form>
          </div>
          <?php
            
          }
        }
        ?>
        </div>
        <div id="carrito">
          
        <?php
      
     
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
            
            <form action="index.php#<?=compra.$codigo?>" method="post">  
              Cantidad: <input type="number" min="0" name="cantidad" value="<?= $cantidad?>" required="true"/> <br>
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>
              <input type="hidden" name="accion" value="actualizar"/>
              <input type="submit" value="Actualizar"/>
            </form>
            <form action="index.php" method="post">  
              <input type="hidden" name="codigo" value="<?= $codigo?>"/>
              <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>
                       
              <input type="submit" value="Eliminar"/>
            </form>
  
          <?php
        }   
      }
     
      if($vacio){
          echo " <h3> El carrito está vacio </h3>";
      }else{
        // Carrito con productos
        if($total >1000){ //descuento a partir de una cantidad
          $_SESSION["descuentoAplicado"] = "DESCUENTO10";
        }
        if (isset( $_SESSION["descuentoAplicado"])) {
          $porcDescuento = $_SESSION['descuentos'][$_SESSION["descuentoAplicado"]];
          echo "te aplica:  ",  $porcDescuento , "% de descuento";
          $totalConDescuento = $total - $total*($porcDescuento/100);
        }
        
        
        ?>
         <form action="index.php" method="post">  
            <input type="text" name="descuento"/>
            <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>
            <input type="hidden" name="accion" value="aplicarDescuento"/>
            <input type="submit" id="aplicarDescuento" value="Aplicar descuento"/>
         </form>
       <?php
        echo "<br><br>total: ", $total, "€";
        
        if (isset($_SESSION["descuentoAplicado"])){
           echo "<br><br>total con descuento: ",$totalConDescuento , "€";
        }
        ?>
          <form action="index.php" method="post">  
            <input type="hidden" name="accion" value="eliminarTodo"/>
            <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>
            <input type="hidden" name="descuento" value="<?= $_SESSION["descuentoAplicado"] = $descuento?>"/>
          <input type="submit" id="vaciarCarrito" value="Vaciar carrito"/>
          </form>
       <?php
     }
    ?>
            </div>
          </div>
      </div>
  </body>
</html>
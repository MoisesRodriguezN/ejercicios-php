<?php
  session_start();
  /*Moisés Rodríguez Naranjo 
   * 28-10-2016 */
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <?php
       $codigo = $_POST["codigo"];
       $codCategoria = $_POST['codCategoria'];
       $accion =  $_POST['accion'];
        
       if($accion == "eliminar"){
          echo "¿Está seguro de que desea eliminar el producto?";
       }else{
          echo "¿Está seguro de que desea vaciar el carrito?";
       }
     
      
      ?>
    
    <form action="index.php" method="post">  
      <input type="hidden" name="codigo" value="<?= $codigo?>"/>
      <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>
      <input type="hidden" name="accion" value="<?= $accion?>"/>           
      <input type="submit" value="Si"/>
    </form>
    
    <form action="index.php" method="post">  
      <input type="hidden" name="codCategoria" value="<?= $codCategoria?>"/>        
      <input type="submit" value="No"/>
    </form>
  </body>
</html>

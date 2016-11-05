<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Baja de clientes</title>
  </head>
  <body>
      <?php
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        $accion = $_POST['accion'];
        if ($accion == "eliminar"){
          $borrar = "DELETE FROM cliente WHERE dni=".$_POST['dni'];
          $conexion->exec($borrar);
          echo "Cliente borrado correctamente.";
          header( "refresh:3;url=index.php" );
          $conexion->close();  
        }else{
          ?> 
          ¿Estás seguro que deseas borrar el cliente?
          <form action="eliminarCliente.php" method="post">
            <input type="hidden" name="accion" value="eliminar">
            <input type="hidden" name="dni" value="<?=$_POST['dni']?>">
            <input type="submit" value="Eliminar">
          </form>
        <?php
        }
        ?>  
  </body>
</html>
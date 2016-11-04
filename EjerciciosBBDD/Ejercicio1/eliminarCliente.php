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
        
          $borrar = "DELETE FROM cliente WHERE dni=".$_POST['dni'];
          $conexion->exec($borrar);
          echo "Cliente borrado correctamente.";
          header( "refresh:3;url=index.php" );
          $conexion->close();         
          ?> 
  </body>
</html>
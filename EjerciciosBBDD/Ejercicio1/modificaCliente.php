<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Modificacioń de clientes</title>
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
        
        if ($accion == "actualizar"){
          $modificacion = "UPDATE cliente SET  nombre=\"$_POST[nombre]\", "
            . "direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"";
          $conexion->exec($modificacion);
          echo "Cliente actualizado correctamente.";
          header( "refresh:3;url=index.php" );
          $conexion->close();
        }else{
      ?>
          <form action="modificaCliente.php" method="post">
            <input type="hidden" name="accion" value="actualizar">
            DNI: <input type="text" name="dni" value="<?=$_POST['dni']?>" readonly="readonly"><br>
            Nombre: <input type="text" name="nombre" value="<?=$_POST['nombre']?>"><br>
            Dirección: <input type="text" name="direccion" value="<?=$_POST['direccion']?>" size="30"><br>
            Teléfono: <input type="text" name="telefono" value="<?=$_POST['telefono']?>"><br>
            <input type="submit" value="Modificar">
      <?php
        }
      ?> 
  </body>
</html>

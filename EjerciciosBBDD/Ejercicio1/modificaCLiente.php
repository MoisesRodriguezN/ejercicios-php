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
        
        $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni=".$_POST['dni']);
        
        if ($consulta->rowCount() > 0) {
        ?>
          Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
          Por favor, vuelva a la <a href="index.php">página de alta de cliente</a>.
        <?php
        }else{
          $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]',"
            . "'$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')";
          $conexion->exec($insercion);
          echo "Cliente dado de alta correctamente.";
          $conexion->close();
          }
          ?> 
  </body>
</html>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // Conexión a la base de datos
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $e->getMessage());
            }
            
            $accion = $_POST['accion'];
            if($accion == "modificar"){
                $modificacion = "UPDATE articulo SET "
                  . "descripcion=\"$_POST[descripcion]\", precio_compra=\"$_POST[precio_compra]\", precio_venta=\"$_POST[precio_venta]\","
                  . " stock=\"$_POST[stock]\" WHERE codigo=\"$_POST[codigo]\"";
                echo $modificacion;
                $conexion->exec($modificacion);//lo ejecuta
                echo "Producto actualizado correctamente.";
                header( "refresh:3;url=index.php" );
                $conexion->close();
            }else{
        ?>
        <form method="post" action="modificaProducto.php">
            <div> 
              <label>&nbsp;&nbsp;Código de Producto:&nbsp;</label><input type="text" size="5" name="codigo" value="<?= $_POST['codigo'] ?>">
            </div>
            <div>
                <label>&nbsp;&nbsp;Descripción:&nbsp;</label><input type="text" size="30" name="descripcion" value="<?= $_POST['descripcion']?>">
            </div>
            <div>
                <label>&nbsp;&nbsp;Precio de Compra:&nbsp;</label><input type="number" step="0.1" name="precio_compra" value="<?= $_POST['precio_compra'] ?>">
            </div>
            <div>
                <label>&nbsp;&nbsp;Precio de Venta:&nbsp;</label><input type="number" name="precio_venta" step="0.1" value="<?= $_POST['precio_venta'] ?>">
            </div>
            <div>
                <label>&nbsp;&nbsp;Stock:&nbsp;</label><input type="number" name="stock" value="<?= $_POST['stock'] ?>">
            </div>
            <div>
                <input type="hidden" name="accion" value="modificar">
            </div>
            <hr>
            
            &nbsp;&nbsp;<a href="index.php"><span></span>Cancelar</a>
            <button type="submit" ><span ></span>Aceptar</button><br><br>
        </form>
        <?php
            }
        ?>
    </body>
</html>

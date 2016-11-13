<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrada Productos</title>
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
            $consulta = $conexion->query("SELECT stock FROM articulo WHERE codigo='$_POST[codigo]'");
            $producto = $consulta->fetchObject();
            $accion = $_POST['accion'];//recojo lo que meto en accion por fomulario y guardo el value que es modificar
            if($accion == "entrada"){ //al ser igual se actualizan los datos
                $sumaStock = $_POST[stock] + $producto->stock;
                $modificacion = "UPDATE articulo SET stock=\"$sumaStock\" WHERE codigo=\"$_POST[codigo]\"";
                $conexion->exec($modificacion);//lo ejecuta
                echo "Producto actualizado correctamente.";
                header( "refresh:3;url=index.php" );//y el refresh que los segundo para que se recargue al index
                $conexion->close();
            }else{
        ?>
        <form method="post" action="entradaProducto.php">
            <div>
                <label>&nbsp;&nbsp;Stock:&nbsp;</label><input type="number" name="stock">
                <input type="hidden" name="codigo" value="<?= $_POST['codigo'] ?>">
                <input type="hidden" name="accion" value="entrada">
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

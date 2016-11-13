<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de clientes</title>
    </head>
    <body>
        <h2>Borrado de artículos</h2>
        <?php
            // Conexión a la base de datos
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $e->getMessage());
            }
           $accion = $_POST['accion'];
            if ($accion == "eliminar"){
            $borrar = "DELETE FROM articulo WHERE codigo='$_POST[codigo]'";
            $conexion -> exec($borrar);
            echo "Producto borrado correctamente";
            header( "refresh:3;url=index.php" );
            $conexion->close();
            } else {
        ?>
            <form action="eliminarProducto.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="codigo" value="<?=$_POST['codigo']?>">
                <input type="submit" value="Eliminar">
            </form> 
            <form action="index.php" method="post">
                <input type="submit" value="Volver">
            </form>
        <?php
            }
        ?>
    </body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de clientes</title>
    </head>
    <body>
        <h2>Alta Cliente</h2>
        <?php
            // Conexión a la base de datos
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $e->getMessage());
            }
        ?>
        <?php
            $insercion = "INSERT INTO articulo (codigo, descripcion, precio_compra, precio_venta, stock) VALUES ('$_POST[codigo]','"
                    . "$_POST[descripcion]','$_POST[precio_compra]','$_POST[precio_venta]','$_POST[stock]')";
            $conexion->exec($insercion);
            echo "Producto dado de alta correctamente.";
        ?>
            <form action="index.php" method="post">
                <input type="submit" value="Volver">
            </form>
    </body>
</html>

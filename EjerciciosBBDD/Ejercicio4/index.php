<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento de productos</title>
    </head>
    <body>
        <h2>Mantenimiento de productos</h2>
        <?php
            // Conexión a la base de datos
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $e->getMessage());
            }
            $consulta = $conexion->query("SELECT * FROM articulo ORDER BY descripcion ASC");//query es para sacar datos
        ?>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Margen</th>
                <th>Stock</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        <?php
            while ($producto = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $producto->codigo ?></td>
                <td><?= $producto->descripcion ?></td>
                <td><?= $producto->precio_compra ?></td>
                <td><?= $producto->precio_venta ?></td>
                <td><?= $producto->precio_venta - $producto->precio_compra ?></td>
                <td><?= $producto->stock ?></td>
                <td>
                    <form action="eliminarProducto.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $producto->codigo ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
                <td>
                    <form action="modificaProducto.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $producto->codigo ?>">
                        <input type="hidden" name="descripcion" value="<?= $producto->descripcion ?>">
                        <input type="hidden" name="precio_compra" value="<?= $producto->precio_compra ?>">
                        <input type="hidden" name="precio_venta" value="<?= $producto->precio_venta ?>">
                        <input type="hidden" name="margen" value="<?= $producto->margen ?>">
                        <input type="hidden" name="stock" value="<?= $producto->stock ?>">
                        <input type="submit" value="Modificar">
                    </form>
                </td>
                <td>
                    <form action="entradaProducto.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $producto->codigo ?>">
                        <input type="hidden" name="stock" value="<?= $producto->stock ?>">
                        <input type="submit" value="Entrada">
                    </form>
                </td>
                <td>
                    <form action="salidaProducto.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $producto->codigo ?>">
                        <input type="hidden" name="stock" value="<?= $producto->stock ?>">
                        <input type="submit" value="Salida">
                    </form>
                </td>
            </tr>
        <?php
            }
        ?>
            <form action="altaProducto.php" method="post">
                <tr>
                    <td>
                        <input type="text" name="codigo">
                    </td>
                    <td>
                        <input type="text" name="descripcion" size="30">
                    </td>
                    <td>
                        <input type="number" name="precio_compra" step="0.01">
                    </td>
                    <td>
                        <input type="number" name="precio_venta" step="0.01">
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        <input type="number" name="stock" size="10">
                    </td>
                    <td>
                        <input type="submit" value="Alta">
                    </td>
                </tr>
            </form>
        </table>
        <?php $conexion->close(); ?>
    </body>
</html>

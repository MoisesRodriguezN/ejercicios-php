<!DOCTYPE html>
<html>
    <head>
        <title>PROGRAMACIÓN PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1>PROGRAMACIÓN PHP</h1>
            <p>Artículos sobre la programación php</p>
        </header>
        <p><a href="../Controller/nuevoArticulo.php">Nuevo Artículo</a></p>
        <?php
          foreach($datosArticulos['articulos'] as $articulo)  {
        ?>
        <article> 
            <h2><?=$articulo->getTitulo()?></h2>
            <p><?=$articulo->getContenido()?></p>
            <p><a href="../Controller/borraArticulo.php?id=<?=$articulo->getId()?>">Borrar Artículo</a></p>
            <p><a href="../Controller/modificacionArticulo.php?id=<?=$articulo->getId()?>">Modificar Artículo</a></p>
            <p>
              <?php
                $fecha=$articulo->getFecha();
                echo date("d-m-Y H:i",strtotime($fecha));
              ?>
            </p>
        </article>
        <?php
          }
        ?>
        <footer>
            &copy; Moisés Rodríguez 2016
        </footer>
    </body>
</html>
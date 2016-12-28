<!DOCTYPE html>
<html>
    <head>
        <title>PROGRAMACIÓN PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../View/css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1>PROGRAMACIÓN PHP</h1>
            <h2 id="subtitulo1">Artículos sobre la programación php</h2>
        </header>
        <p class="boton2"><a href="../Controller/nuevoArticulo.php">Nuevo Artículo</a></p>
        <?php
          foreach($datosArticulos['articulos'] as $articulo)  {
        ?>
        <article> 
            <h2><?=$articulo->getTitulo()?></h2>
            <p><?=$articulo->getContenido()?></p>
            <p class="boton"><a href="../Controller/borraArticulo.php?id=<?=$articulo->getId()?>">Borrar Artículo</a></p>
            <p class="boton"><a href="../Controller/modificacionArticulo.php?id=<?=$articulo->getId()?>">Modificar Artículo</a></p>
            <p class="fecha">
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
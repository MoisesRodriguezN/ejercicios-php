<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../Controller/modificaArticulo.php" method="POST">
      <h3>Título</h3>
      <input type="text" size="40" name="titulo" value="<?=$datosArticulo->getTitulo()?>">
      
      <br><h3>Contenido</h3>
      <textarea name="contenido" cols="60" rows="6">
        <?=$datosArticulo->getContenido()?>
      </textarea><hr>
      <input type="hidden" name="id" value="<?=$datosArticulo->getId()?>">
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>

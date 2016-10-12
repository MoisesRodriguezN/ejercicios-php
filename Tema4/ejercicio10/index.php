<html>
  <head>
    <title></title>
    <!-- Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo.-->
    <meta charset="UTF-8">
  </head>
  <body>
    <div>Introduce números. Para terminar untroduce un núemero negativo <br>
    y será calculada la media.</div>
    
    <?php
      $numerosIntroducidos = $_GET['numeroIntro'];
      $suma = $_GET['suma'];
      $cuentaNumeros = $_GET['cuentaNumeros'];
      $total;
     
      if($numerosIntroducidos < 0){
        $total= $suma/$cuentaNumeros;
      }else{
        if (isset($numerosIntroducidos)) {
          $suma += $numerosIntroducidos ;
          $cuentaNumeros++;
        }
      }
      
     
      
      
    ?>
      <form action="index.php" method="get">
        Número <input type="number" autofocus name="numeroIntro"><br>
        <input type="hidden" name="suma" value="<?php echo $suma; ?>">
        <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
        <input type="submit" value="Aceptar">
      </form>
    <?php
      echo  $total;
    ?>
  </body>
</html>

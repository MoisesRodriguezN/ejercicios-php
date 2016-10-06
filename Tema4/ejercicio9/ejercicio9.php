<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Cuenta los dígitos de un número</title>

  </head>
  <body>
    <?php
      $n = $_GET['numeroIntro'];  
      $numeroDigitos = 1;
      $numeroIntroducido = $n;

      while($n > 9){
        $n = floor($n/10);
        $numeroDigitos ++;  
      }
      
      echo "El número de dijitos para ", $numeroIntroducido , "es: " , + $numeroDigitos;
    ?>
  </body>

</html>
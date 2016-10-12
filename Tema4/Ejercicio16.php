<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Comprueba si un número es primo</title>

  </head>
  <body>
    <?php
      
      $numeroIntroducido = $_GET['numeroIntro'];
      if (!isset($numeroIntroducido)) {
    ?>
      <form action="Ejercicio16.php" method="get">
        Introduce el número <input type="number" name="numeroIntro"><br>
        <input type="submit" value="Aceptar">
      </form>
    <?php  
      }else{  
        $esPrimo = true; 

        for ($i = 2; $i < $numeroIntroducido && $esPrimo; $i++) { 
          if (($numeroIntroducido % $i)  == 0 ) { // ¿es divisible por i?
            $esPrimo = false; 
          }
        }

        if ($esPrimo) {
          echo "El número introducido es primo.";
        } else {
          echo "El número introducido no es primo.";
        }
      }
     
    ?>
  </body>

</html>
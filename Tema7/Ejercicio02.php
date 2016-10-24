<?php
  session_start(); // Inicio de sesión
  if(!isset($_SESSION['cantidadNumeros'])) {
    $_SESSION['cantidadNumeros'] = 0;
    $_SESSION['total'] = 0;
    $_SESSION['maximo'] = 0;
  }    
?>
<!DOCTYPE html>
 
<html>
  <head>
    <title>Media de números impares y máximo de pares</title>
    <meta charset="UTF-8">
  </head>
  <body>    
         
    <?php
      $numero = $_GET['numero'];
      
      if(!isset($numero)){//Primera visita. Inicia variables
        $numero = 0;
        $_SESSION['maximo'] = PHP_INT_MIN;
      }else if(($numero != -1) && ($numero%2!=0)){ //Total y cantidad de números impares
              $_SESSION['total'] += $numero;
              $_SESSION['cantidadNumeros'] += 1;
            }else{ //Máximo par
              if($numero > $_SESSION['maximo']){
                 $_SESSION['maximo'] = $numero; 
              }
            }
      
      if($numero < 0){
        echo "La media de los números impares introducidos es: ", 
          round($_SESSION['total']/$_SESSION['cantidadNumeros'], 2), "<br>";
        echo "El máximo de los números pares es: ",
          $_SESSION['maximo'];
      }else{ 
        ?>
          <form action="Ejercicio02.php" method="get">
            Introduzca un número: <input type="number" name="numero" autofocus="">
            <input type="submit" value="Introducir">
          </form>
          
        <?php
      }
    ?>
  </body>
</html>
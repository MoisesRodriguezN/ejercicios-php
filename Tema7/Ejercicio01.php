<?php
  session_start(); // Inicio de sesión
  if(!isset($_SESSION['cantidadNumeros'])) {
    $_SESSION['cantidadNumeros'] = 0;
    $_SESSION['total'] = 0;
  }    
?>
<!DOCTYPE html>
 
<html>
  <head>
    <title>Media de números</title>
    <meta charset="UTF-8">
  </head>
  <body>    
    
         
    <?php
      $numero = $_GET['numero'];
      
      if(!isset($numero)){ //primera visita
        $numero = 0;
      }else if($numero != -1){ //cálculos cuando se introducen números
        $_SESSION['total'] += $numero;
        $_SESSION['cantidadNumeros'] += 1;
      }
      
      if($numero < 0){ //cuando se introduce un número negativo
        echo "La media de los números introducidos es: ", 
        round($_SESSION['total']/$_SESSION['cantidadNumeros'], 2);
      }else{ 
        ?>
          <form action="Ejercicio01.php" method="get">
            Introduzca un número: <input type="number" name="numero" autofocus="">
            <input type="submit" value="Introducir">
          </form>
          
        <?php
      }
    ?>
  </body>
</html>
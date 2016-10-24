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
      $numero = $_POST['numero'];
      
      if(!isset($numero)){//Primera visita. Inicia variables
        $numero = 0;
      }else if(($numero != -1)){ //Total y cantidad de números
              $_SESSION['total'] += $numero;
              $_SESSION['cantidadNumeros'] += 1;
            }
      
      if($_SESSION['total'] > 1000){
        echo "EL total es:  ", $_SESSION['total'], "<br>";
        echo "La cantidad de números es: ", $_SESSION['cantidadNumeros'], "<br>";
        echo "La media de los números introducidos es: ", 
          round($_SESSION['total']/$_SESSION['cantidadNumeros'], 2);
        
      }else{ 
        ?>
          <form action="Ejercicio03.php" method="post">
            Introduzca un número: <input type="number" name="numero" autofocus="">
            <input type="submit" value="Introducir">
          </form>
          
        <?php
      }
    ?>
  </body>
</html>
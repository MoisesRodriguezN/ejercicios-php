<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Muestra máximos y mínimos</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $cuentaNumeros = $_GET['cuentaNumeros'];
      $maximo = $_GET['maximo'];
      $minimo = $_GET['minimo'];
      $numeros = $_GET['numeros'];
      
      
      if (!isset($n)){
        //Primera visita
        $cuentaNumeros = 0;
        $maximo = PHP_INT_MIN;
        $minimo = PHP_INT_MAX;
        $numeros = "";
      }
      
      if(isset($n) && $cuentaNumeros <=10){
        //Segunda y posteriores visitas
        $cuentaNumeros++;
        if($n > $maximo){
          $maximo = $n; 
        }
        if($n < $minimo){
          $minimo = $n;
        }
        
        $numeros .= " " . $n;
      }
      
      if ($cuentaNumeros == 10){
        //última visita
        $arrayNumeros = explode(" ", $numeros);
        echo "Los números introducidos son: <br>";
        foreach ($arrayNumeros as $valor) {
          echo $valor;
          if($valor == $maximo){
            echo " máximo";
          }
          
           if($valor == $minimo){
            echo " mínimo";
          }
          echo "<br>";
        }
        
      }else{
        ?>  
        <form action="Ejercicio2.php" method="get">
        Número <input type="number" name="n"><br>
        <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
         <input type="hidden" name="maximo" value="<?php echo $maximo; ?>">
         <input type="hidden" name="minimo" value="<?php echo $minimo; ?>">
         <input type="hidden" name="numeros" value="<?php echo $numeros; ?>">
         <input type="submit" value="Aceptar">
        </form>
      <?php  
      }
  
    ?>
    
  </body>

</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Muestra máximos y mínimos y cantidad de primos</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $cuentaNumeros = $_GET['cuentaNumeros'];
      $maximo = $_GET['maximo'];
      $minimo = $_GET['minimo'];
      $numeros = $_GET['numeros'];
      $esPrimo = true; 
      
      if (!isset($n)){
        //Primera visita
        $cuentaNumeros = 0;
        $maximo = PHP_INT_MIN;
        $minimo = PHP_INT_MAX;
        $numeros = "";
        $cuentaPrimos = 0;
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
      
      if ($cuentaNumeros == 6){
        //última visita
        $arrayNumeros = explode(" ", $numeros);
        foreach ($arrayNumeros as $valor) {
          if($valor == $maximo){
            echo $valor , " máximo";
          }
          
          if($valor == $minimo){
            echo $valor, " mínimo";
          }
        }

        for ($i = 0; $i < 6; $i++) {
          $esPrimo = true;

          for ($j = 2; $j < $arrayNumeros[$i] && $esPrimo; $j++) {
            if (($arrayNumeros[$i] % $j) == 0) {
                $esPrimo = false;
            }
          }

          if ($esPrimo) {
            echo $arrayNumeros[$i] , " ";
            $cuentaPrimos++;
          } 
        }
        $cuentaPrimos--; 
        echo $cuentaPrimos , " Números prímos";
      }else{
        ?>  
        <form action="Ejercicio01.php" method="get">
        Número <input type="number" autofocus name="n"><br>
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


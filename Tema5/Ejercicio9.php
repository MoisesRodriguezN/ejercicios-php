<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Coloca en las primera posiciones los números primos</title>
        <style>
          td,tr, table{
              border-bottom: 1px solid black;
              border-collapse: collapse;
              padding-left: 50px;
              text-align: center;
          }
          
          #inicial{
              text-align: center;
          }
        </style>
        
  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $cuentaNumeros = $_GET['cuentaNumeros'];
      $numeros = $_GET['numeros'];
      $esPrimo = true; 
      $posInicial = $_GET['posInicial'];
      $posFinal = $_GET['posFinal'];
      
      
      if (!isset($n)){
        //Primera visita
        $cuentaNumeros = 0;
        $numeros = "";
        $posInicial = 0;
        $posFinal = 0;
      }
      
      if(isset($n) && $cuentaNumeros <=10){
        //Segunda y posteriores visitas
        $cuentaNumeros++;
        $numeros .= " " . $n;
      }
      
      if ($cuentaNumeros == 10){
        $numeros = substr($numeros, 1);
        $arrayNumeros = explode(" ", $numeros);

        for($i = 0; $i < count($arrayNumeros); $i++){
          echo"   " , $i , "   ";
        }

        echo "<br>";

        for($i = 0; $i < count($arrayNumeros); $i++){
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $arrayNumeros[$i];
        }

        echo "<br>";

        $numeroInicial = $arrayNumeros[$posInicial];
        $numeroFinal = $arrayNumeros[count($arrayNumeros)-1];

        for($i = count($arrayNumeros)-1; $i >= $posFinal; $i--){
          $arrayNumeros[$i] = $arrayNumeros[$i - 1];
        }

        $arrayNumeros[$posFinal] = $numeroInicial;

        for($i = $posInicial; $i > 0; $i--){
          $arrayNumeros[$i] = $arrayNumeros[$i - 1];
        }

        $arrayNumeros[0] = $numeroFinal;

        //Muestra de nuevo el array

        for($i = 0; $i < $arrayNumeros; $i++){
          echo "   " ,  $i , "   ";
        }

        echo ("<br>");

        for($i = 0; $i < count($arrayNumeros); $i++){
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $arrayNumeros[$i];
        }
      }else{
        ?>  
        <form action="Ejercicio8.php" method="get">
        Número <input type="number" autofocus name="n"><br>
        Posicion incial <input type="number" autofocus name="posInicial"><br>
        Posicion final <input type="number" autofocus name="posFinal"><br>
        <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
         <input type="hidden" name="numeros" value="<?php echo $numeros; ?>">
         <input type="hidden" name="numeros" value="<?php echo $posInicial; ?>">
         <input type="hidden" name="numeros" value="<?php echo $posFinal; ?>">
         <input type="submit" value="Aceptar">  
        </form>
        <?php  
      }
  
    ?>
    
  </body>

</html>
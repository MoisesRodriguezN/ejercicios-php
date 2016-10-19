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
      }
      
      if(isset($n) && $cuentaNumeros <=10){
        //Segunda y posteriores visitas
        $cuentaNumeros++;
        $numeros .= " " . $n;
      }
      
      if ($cuentaNumeros == 10){
        $numeros = substr($numeros, 1);
        $arrayNumeros = explode(" ", $numeros);
         
        echo "<br>";
        echo "Array original";
        echo "<br>";
        for($i = 0; $i < count($arrayNumeros); $i++){
        echo "&nbsp;", $i,"&nbsp;";
        }

        echo "<br>";
        
        for($i = 0; $i < count($arrayNumeros); $i++){
          echo "&nbsp;", $arrayNumeros[$i], "&nbsp;";
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
    
       
        echo "<br>";
        echo "Array modificado";
        echo "<br>";
       
        
        $arrayNumeros[0] = $numeroFinal;
        
        for($i = 0; $i < count($arrayNumeros); $i++){
          echo "&nbsp;", $i, "&nbsp;";
        }

        echo ("<br>");

        for($i = 0; $i < count($arrayNumeros); $i++){
          echo "&nbsp;", $arrayNumeros[$i], "&nbsp;";
        }
      }else{
        ?>  
        <form action="Ejercicio9.php" method="get">
        Número <input type="number" autofocus name="n"><br>
        <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
        <input type="hidden" name="numeros" value="<?php echo $numeros; ?>">
       
        <?php
        
          if($cuentaNumeros == 9){
            ?>
            Posicion incial <input type="number" name="posInicial"><br>
            Posicion final <input type="number" name="posFinal"><br>
        <?php
          }
        ?>
        <input type="submit" value="Aceptar">  
        </form>
        <?php   
      }
  
    ?>
    
  </body>

</html>
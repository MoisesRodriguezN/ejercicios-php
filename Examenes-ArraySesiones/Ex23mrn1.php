<?php
  session_start(); // Inicio de sesión
if(!isset($_SESSION['cuentaNumeros'])) {
  $_SESSION['cuentaNumeros'] = 0;
  $_SESSION['numeros'] = "";
  
  /*Moisés Rodríguez Naranjo 
   * 28-10-2016 */
}

?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Coloca en las primeras posiciones los números no primos</title>
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
      $esPrimo = true; 
      
      if (!isset($n)){
        //Primera visita
        $_SESSION['cuentaNumeros'] = 0;
        $_SESSION['numeros']= "";
      }
      
      if(isset($n) && $n >= 0){
        //Segunda y posteriores visitas
        $_SESSION['cuentaNumeros']++;
        $_SESSION['numeros'] .= " " . $n;
      }
      
      if ($n <0){
        //última visita
       $_SESSION['numeros'] = substr($_SESSION['numeros'], 1);
       $arrayNumeros = explode(" ", $_SESSION['numeros']);
        
       
        echo "<table>";
        echo "<th id=\"inicial\">ARRAY INCIAL</th>";
        echo "<tr>";
        echo "<td>Indice: </td>";
        foreach ($arrayNumeros as $key => $value) {   
          echo "<td>", $key , "</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td>Valores: </td>";
        foreach ($arrayNumeros as $key => $value) {   
          echo "<td>", $value , "</td>";
        }
        echo "</tr>";
        echo "</table>";
        
      $cuentaPrimos = 0;
      $cuentaNoPrimos = 0;
    
        
      for ($i = 0; $i <  $_SESSION['cuentaNumeros']; $i++) {
       $esPrimo = true;

      for ($j = 2; $j < $arrayNumeros[$i] && $esPrimo; $j++) {
        if (($arrayNumeros[$i] % $j) == 0) {
            $esPrimo = false;
        }
      }

      if ($esPrimo) {
        
        $primos[$cuentaPrimos] = $arrayNumeros[$i];
        $cuentaPrimos++;
      
      } else {
        $noPrimos[$cuentaNoPrimos] = $arrayNumeros[$i];
        $cuentaNoPrimos++;
      }
    }

    for ($i = 0; $i < count($noPrimos); $i++){
      $arrayNumeros[$i] = $noPrimos[$i];
    }
    
    $indicePrimo = count($noPrimos);
    for ($i = $indicePrimo; $i < $cuentaPrimos + $cuentaNoPrimos; $i++){
      $arrayNumeros[$i]= $primos[$i - $cuentaNoPrimos];
    }    
        
        echo "<table>";
        echo "<th id=\"inicial\">ARRAY MODIFICADO</th>";
        echo "<tr>";
        echo "<td>Indice: </td>";
        foreach ($arrayNumeros as $key => $value) {   
          echo "<td>", $key , "</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td>Valores: </td>";
        foreach ($arrayNumeros as $key => $value) {   
          echo "<td>", $value , "</td>";
        }
        echo "</tr>";
        echo "</table>";
        
      }else{
        ?>  
        <form action="Ex23mrn1.php" method="get">
        Número <input type="number" autofocus name="n"><br>
         <input type="submit" value="Aceptar">
        </form>
      <?php  
      }
  
    ?>
    
  </body>

</html>
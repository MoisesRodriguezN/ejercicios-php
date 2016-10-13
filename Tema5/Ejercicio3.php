<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Rota Array</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $cuentaNumeros = $_GET['cuentaNumeros'];
      $numeros = $_GET['numeros'];
      
      
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
      
      if ($cuentaNumeros == 5){
        //última visita
        $arrayNumeros = explode(" ", $numeros);
        $arrayNumeros2 = $arrayNumeros;
        
        // MUestra array original
        echo "EL array introducido es : <br>";
        foreach ($arrayNumeros as $valor) {
          echo $valor , " ";
        }
        echo "<br>";
        //Rota array
        $posUltimo = count($arrayNumeros)-1;
        $ultimo = $arrayNumeros[$posUltimo];
        for ($i = $posUltimo; $i > 0; $i--){
          $arrayNumeros[$i] = $arrayNumeros[$i-1];
        }
        $arrayNumeros[0] = $ultimo;
        
       /* Rotar 2 veces
        $posUltimo = count($arrayNumeros)-1;
        $ultimo = $arrayNumeros[$posUltimo];
        for ($i = $posUltimo; $i > 0; $i--){
          $arrayNumeros[$i] = $arrayNumeros[$i-1];
        }
        $arrayNumeros[0] = $ultimo;
        */
        //Rota array a la izquierda
        $posUltimo = count($arrayNumeros2);
        $primero = $arrayNumeros2[1];
        for ($i = 1; $i < $posUltimo; $i++){
          $arrayNumeros2[$i] = $arrayNumeros2[$i+1];
        }
        $arrayNumeros2[$posUltimo] = $primero;
        
        
        
        // MUestra array rotado a la derecha
        echo "EL array rotado es : <br>";
        foreach ($arrayNumeros as $valor) {
          echo $valor , " ";
        }
        
        echo "<br>";
        // MUestra array rotado a la izquierda
        echo "EL array rotado es : <br>";
        foreach ($arrayNumeros2 as $valor) {
          echo $valor , " ";
        }
        
      }else{
        ?>  
        <form action="Ejercicio3.php" method="get">
        Número <input type="number" name="n"><br>
        <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
         <input type="hidden" name="numeros" value="<?php echo $numeros; ?>">
         <input type="submit" value="Aceptar">
        </form>
      <?php  
      }
  
    ?>
    
  </body>

</html>
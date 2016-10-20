<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Mueve a las primeras posiciones los números pares</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $n2 = $_GET['n2'];
      $numeros = $_GET['numeros'];
      $arrayFinal;
      $numeros = "";


      for ($i = 0; $i < 20; $i++) {
        // números aleatorios entre 0 y 20 (ambos incluidos)
        $numeroAleatorio= rand(0, 100);
        $numeros .= " " . $numeroAleatorio;
      }
      $arrayNumeros = explode(" ", $numeros);
      echo "<br>";
      echo "ARRAY ORIGINAL";
      echo "<br> <br>";
      for($i = 0; $i < 20; $i++){
        //Muestra el array original
        echo $arrayNumeros[$i] , " ";
      }
              
      //Segunda y posteriores visitas
      echo "<br> <br>";
      echo "ARRAY MODIFICADO";
      echo "<br> <br>";
      for($i = 0; $i < 20; $i++){
        //Muestra el array modicado
        if ($arrayNumeros[$i] %2==0){
          $arrayFinal[$i] = $arrayNumeros[$i];
          echo $arrayFinal[$i], " ";
        }
      }
      
      for($i = 0; $i < 20; $i++){
        //Muestra el array modicado
        if ($arrayNumeros[$i] %2!=0){
          $arrayFinal[$i] = $arrayNumeros[$i];
          echo $arrayFinal[$i], " " ;
        }
      }  
    ?>
    
  </body>

</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $numero1 = $_GET['n1'];
      $numero2 = $_GET['n2'];
      $numero3 = $_GET['n3'];
      
      echo "Los numeros introducidos son: $numero1,$numero2,$numero3 <br>";
      //Ordena los dos primeros
      if($numero1 > $numero2){
        $aux = $numero1; //guarda en aux el número 1
        $numero1 = $numero2;//paso a primero el segundo número
        $numero2 = $aux; //guarda el primer número como segundo.
      }
      //Ordena los dos últimos
      if($numero2 > $numero3){
        $aux = $numero2; //guarda en aux el número 2
        $numero2 = $numero3;//paso a segundo el tercer número
        $numero3 = $aux; //guarda el segundo número como tercero.
      }
      //Ordena de nuevo los dos primeros
      if($numero1 > $numero2){
        $aux = $numero1; //guarda en aux el número 1
        $numero1 = $numero2;//paso a primero el segundo número
        $numero2 = $aux; //guarda el primer número como segundo.
      }
      
      echo "Ordenados: $numero1,$numero2,$numero3";
    ?>
  </body>

</html>


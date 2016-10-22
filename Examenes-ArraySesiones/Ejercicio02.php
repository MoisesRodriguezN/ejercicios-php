<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Coloca en las primeras posiciones los números primos</title>
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
      $cuentaImpares = 0;
      $cuentaPares = 0;
      $esPar = true;      
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
        //última visita
        $numeros = substr($numeros, 1);
        $arrayNumeros = explode(" ", $numeros);
        
       
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
   
      for ($i = 0; $i < 10; $i++) {

      if ($arrayNumeros[$i]%2==0) {
        $pares[$cuentaPares] = $arrayNumeros[$i];
        $cuentaPares++;
      
      } else {
        $impares[$cuentaImpares] = $arrayNumeros[$i];
        $cuentaImpares++;
      }
    }
    
    $indicePar = 0;
    $indiceImpar = 0;
    
    echo $cuentaImpares ," impares";
    echo "<br>";
    echo $cuentaPares , " pares";
    echo "<br>";
    
  

    for ($i = 0; $i < 10; $i++){
      if ($esPar && $indicePar < $cuentaPares){ //Si le toca al par y quedan pares 
        $arrayNumeros[$i]=$pares[$indicePar]; 
        $indicePar++;
        $esPar = false; //Hace que la siguiente vez le toque a los impares
      }else{
        if($indiceImpar < $cuentaImpares){ //Si quedan impares.
           $arrayNumeros[$i] = $impares[$indiceImpar];
           $indiceImpar++;
           $esPar = true;
        }else{
          $esPar = true; 
          $i--;//comentario1
        }     
      } 
    }
    
    /* comentario1:
      Si no se cumple que indiceImpar sea menor que la cuenta de impares, que quiere
      decir que no quedan mas números impares, se pone a true la variable esPar,
      así la siguiente vez entra a agregar el siguiente número par. 
      Una vez salga, sumará +1 en el bucle for, así no funciona bien.
     
      La vez que entra que ya no quedan impares, no modifica nada en esa posición del array,
      Por lo que aparece un número que no es (el que ya había en esa posició) 
      y es necesario restar -1 al indice para que en esa posición guarde el par,
      en vez de hacerlo en la siguiente.
      para 
    */
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
        <form action="Ejercicio02.php" method="get">
        Número <input type="number" autofocus name="n"><br>
        <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
         <input type="hidden" name="numeros" value="<?php echo $numeros; ?>">
         <input type="submit" value="Aceptar">
        </form>
      <?php  
      }
  
    ?>
    
  </body>

</html>
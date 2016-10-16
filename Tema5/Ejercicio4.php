<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Rota Array</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $n2 = $_GET['n2'];
      $numeros = $_GET['numeros'];
      
       
      if (!isset($n)){
        //Primera visita
        $numeros = "";
      }

        for ($i = 0; $i < 100; $i++) {
          // números aleatorios entre 0 y 20 (ambos incluidos)
          $numeroAleatorio= rand(0, 20);
          $numeros .= " " . $numeroAleatorio;
        }
        $arrayNumeros = explode(" ", $numeros);
        
        for($i = 0; $i < 100; $i++){
          //Muestra el array original
          echo $arrayNumeros[$i] , " ";
        }
              
      if(isset($n)){
        //Segunda y posteriores visitas
        echo "<br>";
        
        for($i = 0; $i < 100; $i++){
          //Muestra el array modicado
          if($arrayNumeros[$i] == $n){
            $arrayNumeros[$i]= $n2;
            echo "<span style=\"color: red;\">" , $arrayNumeros[$i], " ", "</span>";
          }else{
            echo  $arrayNumeros[$i], " ";
          }
         
        }
        
      }
       
      ?>  
        <form action="Ejercicio4.php" method="get">
        Número a sustituir <input type="number" name="n"><br>
        Número nuevo <input type="number" name="n2"><br>
        <input type="hidden" name="numeros" value="<?php echo $numeros ?>">
        <input type="submit" value="Aceptar">
        </form>
      <?php  
      
  
    ?>
    
  </body>

</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Numeros impares y pares de colores</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $numeros = $_GET['numeros'];
      $contador = $_GET['contador'];
  
      if (!isset($n)){
        //Primera visita
        $numeros = "";
        $contador = 0;
      }else{
        $contador ++;
      }
      
      if ($contador <= 8){
       
        $numeros .= " " . $n;
        if($contador <= 7){
           ?>  
            <form action="Ejercicio6.php" method="get">
            Introduce 8 números:
            <input type="number" autofocus name="n"><br>
            <input type="hidden" name="numeros" value="<?php echo $numeros ?>">
            <input type="hidden" name="contador" value="<?php echo $contador ?>">
            <input type="submit" value="Aceptar">
            </form>
          <?php  
        }else{
          $numeros = substr($numeros, 2);//Elimina los dos primeros espacios
          $arrayNumeros = explode(" ", $numeros);
          
            for($i = 0; $i < count($arrayNumeros); $i++){
              if ($arrayNumeros[$i] %2==0){
                echo "<span style=\"color: red;\">" , $arrayNumeros[$i], " ", "</span>";
              }else{
                echo "<span style=\"color: blue;\">" , $arrayNumeros[$i], " ", "</span>";
              }
            }
            echo "<br>";
            echo "Los números impares son  <span style=\"color: blue;\"> azules </span>";
            echo "<br>";
            echo "Los números pares son  <span style=\"color: red;\"> rojos </span>";
        }   
      }
       
    ?>
    
  </body>

</html>


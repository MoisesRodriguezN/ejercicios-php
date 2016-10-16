<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Tempearatura de cada mes</title>

  </head>
  <body>
    <?php
      $n =  $_GET['n'];
      $numeros = $_GET['numeros'];
      $contador = $_GET['contador'];
      $mes = array(
      "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
       
      if (!isset($n)){
        //Primera visita
        $numeros = "";
        $contador = 0;
      }else{
        $contador ++;
      }
      
      if ($contador <= 12){
       
        $numeros .= " " . $n;
        if($contador <= 11){
           ?>  
            <form action="Ejercicio5.php" method="get">
            Temperatura de <?php echo $mes[$contador]?> <input type="number" autofocus name="n"><br>
            <input type="hidden" name="numeros" value="<?php echo $numeros ?>">
            <input type="hidden" name="contador" value="<?php echo $contador ?>">
            <input type="submit" value="Aceptar">
            </form>
          <?php  
        }else{
          $numeros = substr($numeros, 2);//Elimina los dos primeros espacios
          $arrayNumeros = explode(" ", $numeros);
          
          //Muestra el contenido de las variables
          /*
          echo "<pre>";

          var_dump($arrayNumeros);

          echo "</pre>";
          */
           
          echo "<table>";
          for($x = 0; $x < count($arrayNumeros); $x++){
            echo "<tr><td>" , $mes[$x] , "</td><td>";
            for ($i = 0; $i < $arrayNumeros[$x]; $i++){
              echo "<img src=\"bgAzul.png\">";
            }
            echo "<br></td></tr>";
          }
          echo "</table>";
        }
      }
       
    ?>
    
  </body>

</html>

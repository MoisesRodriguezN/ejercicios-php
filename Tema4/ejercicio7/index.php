<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Caja fuerte</title>
        <style>
          
          #img1{
            position: absolute; 
            top:0px;
            left:0px;
          }
          
          #img2{
            position: absolute; 
            top:0px;
            left:0px;
          }
          
          #contenedor{
              position: relative;
              top: 460px;
          }
        </style>
  </head>
  <body>
    <?php
    $numeros;
    $nDigitos = 4;
    $intentos = 4;
    $terminado = false;
    $combinacion = $_GET['combinacion'] . $_GET['digito']; //digitos introducidos
    
    if (isset($_GET['numero'])) {
      $numeros = $_GET['numero'];
    }else{
      $numeros = rand (1000 , 9999);
    }
    
    if (isset($_GET['nDigitos'])) {
      $nDigitos = $_GET['nDigitos'];
    }else{
      $nDigitos= 4;
    }
    
    if (isset($_GET['intentos2'])) {
      $intentos = $_GET['intentos2'];
    }else{
      $intentos = 4;
    }
    
    ?>
    <img src="caja.jpg" width="600" height="500" id="img2" usemap="#cajafuerte">
    <?php
      if($nDigitos >= 0){
        echo $nDigitos;
         if($nDigitos == 0){
          $terminado = true;
        }
        $nDigitos--;      
      }
      
 
      echo "<div id=\"contenedor\">";
      echo "<br>","<br>", "la combinacion es: ", $numeros, "<br>";
      
      if ($terminado){
        if($combinacion == $numeros){
          echo "Se ha abierto la caja fuerte";
          $acertado = true;
        }else{
          $intentos--;
          if($intentos > 0){
            echo "Código incorrecto, presione almohadilla";
          }else{
            echo "Intento Agotados, caja bloqueada";
          }
         
          $combinacion="";
          echo "</div>";
          $terminado = false;
          $nDigitos = 4;
          if($intentos == 0){
            
          }else{
            
            ?>
    
            <img src="caja2.jpg" width="600" height="500" id="img1" usemap="#cajaBloqueada"> 
            <map name="cajaBloqueada">
            <area shape="rect" coords="379,314,392,329" href="index.php?nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <?php
          }
          ?>
          
          </map>
            <?php
        }
      } else {
        ?>
        <map name="cajafuerte">
          <area shape="rect" coords="308,215,330,233" href="index.php?digito=1&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="342,212,357,233" href="index.php?digito=2&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="376,215,393,233" href="index.php?digito=3&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="311,247,327,268" href="index.php?digito=4&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="345,247,359,268" href="index.php?digito=5&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="377,245,395,268" href="index.php?digito=6&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="310,278,326,298" href="index.php?digito=7&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="345,278,361,298" href="index.php?digito=8&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="372,278,395,292" href="index.php?digito=9&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">
          <area shape="rect" coords="345,310,360,331" href="index.php?digito=0&&combinacion=<?=$combinacion?>&&nDigitos=<?=$nDigitos?>&&numero=<?=$numeros?>&&intentos2=<?=$intentos?>">

        </map>
    
        <?php
      }
        
      
    ?>
  </body>

</html>
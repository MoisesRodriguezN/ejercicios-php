<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Caja fuerte</title>

  </head>
  <body>
    <?php
    $digitoUno = rand (0 , 9);
    $digitoDos = rand (0 , 9);
    $digitoTres = rand (0 , 9);
    $digitoCuatro = rand (0 , 9);
    $intentos = 4;
    $acertado = false;
    $combinacion = $_GET['combinacion'] . $_GET['digito'];
    
    if (isset($_GET['intentos'])) {
      $intentos = $_GET['intentos'];
    }else{
      $intentos = 4;
    }
    
    ?>
    <img src="caja.jpg" width="600" height="500" usemap="#cajafuerte">
    <?php
      if($intentos > 0){
        $intentos--;
    ?>
    <map name="cajafuerte">
      <area shape="rect" coords="308,215,330,233" href="index.php?digito=1&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="342,212,357,233" href="index.php?digito=2&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="376,215,393,233" href="index.php?digito=3&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="311,247,327,268" href="index.php?digito=4&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="345,247,359,268" href="index.php?digito=5&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="377,245,395,268" href="index.php?digito=6&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="310,278,326,298" href="index.php?digito=7&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="345,278,361,298" href="index.php?digito=8&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="372,278,395,292" href="index.php?digito=9&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      <area shape="rect" coords="345,310,360,331" href="index.php?digito=0&&combinacion=<?=$combinacion?>&&intentos=<?=$intentos?>">
      
    </map>
    
    <?php
      }
    ?>
    <br>
    <?php
      echo $combinacion;
    ?>
  </body>

</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $base = $_GET['base'];
      $altura = $_GET['altura'];
      $total = $base * $altura;
      echo " base x altura --> " , "= ", $total,"cm2";
    ?>
  </body>

</html>
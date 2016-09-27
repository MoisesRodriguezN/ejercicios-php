<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $radio = $_GET['radio'];
      $altura = $_GET['altura'];
      $volumen = round(((1/3) * pi() * $radio * $radio * $altura),$precision=2);
      echo " El volumen del cono es --> " , $volumen,"cm3";
    ?>
  </body>

</html>

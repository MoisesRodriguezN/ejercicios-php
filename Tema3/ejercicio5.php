<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
          $a = $_get['a'];
          $b = $_get['b'];

          if ($a == 0) {
            echo "La ecuación no tiene solución.";
          } else {
            echo "x = ", (-$b / $a);
          }
    ?>
  </body>

</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $pesetas = $_GET['pesetas'];
      
      echo $pesetas, " pesetas son ", round($pesetas / 166.386, $precision = 2), " euros.";
    ?>
  </body>

</html>
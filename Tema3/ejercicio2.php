<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $hora = $_GET['hora'];
      
      if (($hora >=6) && ($hora <=12)){
        echo "Buenos días";     
      }
      
      if (($hora >=13) && ($hora <=20)){
        echo "Buenas tardes";
      }
      
      if (($hora >=21) && ($hora <=23)){
        echo "Buenas noches";
      }
      
      if (($hora >=0) && ($hora <=5)){
        echo "Buenas noches";
      }
    ?>
  </body>

</html>

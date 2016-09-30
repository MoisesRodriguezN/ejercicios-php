<!DOCTYPE html>
<html>
  <head>
    <title>Muestra números con do-wile</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $i = 320;
      
      do {
        echo "El valor de i es ", $i,"<br>"; 
        $i-=20;
      } while( $i >= 160 )
    ?>
  </body>

</html>
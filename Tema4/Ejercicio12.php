<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Pimeros términos de la serie fibonazi</title>

  </head>
  <body>
    <div>
      <?php
        $contador = $_GET['numeroIntro'];
          $f1 = 0;
          $f2 = 1;
          $suma;

          if (!isset($contador)) {
            ?>
              Introduce el número de elementos:

              <form action="Ejercicio12.php" method="get">
                Número de elementos <input type="number" name="numeroIntro"><br>
                <input type="submit" value="Aceptar">
              </form>

            <?php
          }else{
            echo "Resultado:";
            echo "0,";

            do {
              echo $f2 , "," ;
              $suma = $f1 + $f2;
              $f1 = $f2;
              $f2 = $suma;
              $contador --;
            } while ($contador >1);
          }
      ?>
    </div>
  </body>
</html>
 
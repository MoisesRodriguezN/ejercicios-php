<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Media impares y mayor de los pares</title>

  </head>
  <body>
   
    <?php
        $numeroIntroducido = $_GET['numeros'];  
        $cuentaNumeros = $_GET['cuentaNumeros'];
        $sumaImpares = $_GET['sumaImpares'];
        $mayorPar = $_GET['mayorPar'];
        $cuentaImpares = $_GET['cuentaImpares'];
       
      if ($numeroIntroducido < 0) {
        echo "El mayor de los pares es: ", $mayorPar;
        echo "Se han introducido: ", $cuentaNumeros, " números";
        echo "La media de los números impares es: ", ($sumaImpares/$cuentaImpares);
      }else{
        if (!isset($numeroIntroducido)){
          ?>
          <form action="Ejercicio21.php" method="get">
            Número <input type="number" name="numeros"><br>
            <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
            <input type="hidden" name="sumaImpares" value="<?php echo $sumaImpares; ?>">
            <input type="hidden" name="cuentaImpares" value="<?php echo $cuentaImpares; ?>">
            <input type="hidden" name="mayorPar" value="<?php echo $mayorPar; ?>">
            <input type="submit" value="Aceptar">
          </form>
          <?php
        }else{   
          do {  
            $cuentaNumeros++;  //Se cuenta la cantidad de números introducidos 
            if ($numeroIntroducido %2!=0){
              $numeroIntroducido %2;
              $sumaImpares += $numeroIntroducido;
              $cuentaImpares++;
            //Se suman en "sumaImpares" los numeros introducidos impares
            //Se cuentan los números impares para desues hacer la media

            } else {
              if ($numeroIntroducido > $mayorPar) {
                 $mayorPar = $numeroIntroducido;
              }
            }
          } while ($numeroIntroducido >=0);
        }
       
      }
    ?>
  </body>
</html>
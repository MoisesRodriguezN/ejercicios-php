<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Media impares y mayor de los pares</title>

  </head>
  <body>
   
    <?php
        $numeroIntroducido = $_GET['numero'];  
        $cuentaNumeros = $_GET['cuentaNumeros'];
        $sumaImpares = $_GET['sumaImpares'];
        $cuentaImpares = $_GET['cuentaImpares'];
        $mayorPar = $_GET['mayorPar'];
        
       
        if (!isset($numeroIntroducido)){
          $cuentaNumeros = 0;
          $sumaImpares = 0;
          $cuentaImpares = 0;
          $mayorPar = PHP_INT_MIN;
        }
        
        if ($numeroIntroducido < 0) {
          // Numero negativo
          if($cuentaNumeros == 0){
            echo "No se han introducido números";
          }else{
            echo "Se han introducido: ", $cuentaNumeros, " números <br>";
            echo "La media de los números impares es: ", ($sumaImpares/$cuentaImpares) , "<br>";
            echo "El mayor de los pares es: ", $mayorPar, "<br>";
          }
          
          
        } else if (isset($numeroIntroducido) && $numeroIntroducido >= 0) {
          $cuentaNumeros++; 


          if ($numeroIntroducido %2!=0){
            // Impar
            $sumaImpares += $numeroIntroducido;
            $cuentaImpares++;
          //Se suman en "sumaImpares" los numeros introducidos impares
          //Se cuentan los números impares para desues hacer la media

          } else {
            // Par
            if ($numeroIntroducido > $mayorPar) {
               $mayorPar = $numeroIntroducido;
            }
          }

        }
        
        if ($numeroIntroducido >=0 || !isset($numeroIntroducido)) {
          ?>
            <form action="Ejercicio21.php" method="get">
              Número <input type="number" name="numero"><br>
              <input type="hidden" name="cuentaNumeros" value="<?php echo $cuentaNumeros; ?>">
              <input type="hidden" name="sumaImpares" value="<?php echo $sumaImpares; ?>">
              <input type="hidden" name="cuentaImpares" value="<?php echo $cuentaImpares; ?>">
              <input type="hidden" name="mayorPar" value="<?php echo $mayorPar; ?>">
              <input type="submit" value="Aceptar">
            </form>
            <?php
        }
       
    ?>
  </body>
</html>
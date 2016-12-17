<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          include_once 'Bicicleta.php';
          include_once 'Coche.php';
          $powerCanion = new Bicicleta("campo");
          $roadBike = new Bicicleta("carretera");
          $miCoche = new Coche();
          echo $powerCanion->hazElCaballito();
          echo $roadBike->hazElCaballito();
          
          $powerCanion->recorre(2);
          $roadBike->recorre(6);
          $powerCanion->recorre(10);
          $miCoche->recorre(30);
          echo $miCoche->quemaRueda();
          
          echo "Total de vehículos creados: ", Vehiculo::getVehiculosCreados(), "<br>";
          echo "La bici Powercanion lleva: " ,$powerCanion->getKmRecorridos() , "km<br>";
          echo "La bici roadBike lleva: " ,$roadBike->getKmRecorridos() , "km<br>";
          echo "Total de kilometros recorridos: ", Vehiculo::getKmTotales(),"km";   
        ?>
    </body>
</html>

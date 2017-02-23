<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Servicio web de cartas aleatorias de la baraja española</title>
    </head>
    <body>
        <?php
          $palos = ['Espadas', 'Basto', 'Oro', 'Copa'];
          $numeros = ['As','2','3','4','5','6','7','8','9','Sota','Caballo','Rey'];
          $numeroDeCartas = $_GET['cantidad'];
          $baraja = [];
          if(($numeroDeCartas<=48)&&($numeroDeCartas>0)){
            while($numeroDeCartas>0){
              $paloSeleccionado = $palos[rand(0,3)];
              $numeroSeleccionado = $numeros[rand(0,11)];
              $carta = [
                'numero' => $numeroSeleccionado,
                'palo' => $paloSeleccionado
              ];
              if(!in_array($carta, $baraja)){
                  $baraja[] = $carta;
                  $numeroDeCartas--;
              }
            }
            echo json_encode($baraja);
          } else {
            echo "La cantidad de cartas no puede ser menor a 1 o mayor a 48.";
          }
        ?>
    </body>
</html>

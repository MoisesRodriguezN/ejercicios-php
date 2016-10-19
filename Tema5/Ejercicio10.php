<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Coloca el número inicial en el final</title>
        <style>
        </style>
        
  </head>
  <body>
    <?php
      $puntuacion = array (
        'as' => 11, 'dos' => 0, 'tres' => 10, 'cuatro' => 0, 'cinco' => 0,
        'seis' => 0, 'siete' => 0, 'sota' => 2, 'caballo' => 3, 'rey' => 4);
    
      $palo = array ('oros', 'copas', 'bastos', 'espadas');
    
      $figura = array ('as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete',
        'sota', 'caballo', 'rey');
      
    $cartasEchadas = "";
    $contadorCartasEchadas = 0;
    $puntosTotales = 0;

    do { //Mientras no haya 10 catas
      $paloCarta = $palo[rand(0, 3)]; //Genera un palo aleatorio
      $figuraCarta = $figura[rand(0, 9)]; //Genera una sigura aleatoria
      $puntosCarta = $puntuacion[$figuraCarta]; //Guarda la puntuación de la carta
      $nombreCarta = "$figuraCarta de $paloCarta"; //Guardo el nombre completo de la carta
      if (!in_array($nombreCarta, $cartasEchadas)) { //Si el nombre de la carta no está en las cartas hechadas
                                                     //Evita que se repitan las cartas
        echo "$nombreCarta - $puntosCarta puntos<br>"; 
        $cartasEchadas[] = $nombreCarta; //Guarda en el array cada carta que se heche y no esté repetida
        $contadorCartasEchadas++;
        $puntosTotales += $puntosCarta;
      }
    } while ($contadorCartasEchadas < 10); 

    echo "<br><b>Total: $puntosTotales puntos</b>";

    ?>
    
  </body>

</html>
<!-- /*Moisés Rodríguez Naranjo 
   * 28-10-2016 */-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Saca 5 cartas de la bajara española</title>
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
      $num1 = rand(0, 3);
      $num2 = rand(0, 9);
      $paloCarta = $palo[$num1]; //Genera un palo aleatorio
      $figuraCarta = $figura[$num2]; //Genera una sigura aleatoria
      
      if($num1 != $num2){
      $puntosCarta = $puntuacion[$figuraCarta]; //Guarda la puntuación de la carta
      $nombreCarta = "$figuraCarta de $paloCarta"; //Guardo el nombre completo de la carta
     
      $contadorFin++ ;
      echo $contadorFin;
      }
    } while ($contadorFin < 5); 
    
    if ($contadorFin ==5){
    for ($i = 0; $i < 6; $i++){
      if (!in_array($nombreCarta, $cartasEchadas)) { //Si el nombre de la carta no está en las cartas hechadas
                                                     //Evita que se repitan las cartas
        echo "$nombreCarta - $puntosCarta puntos<br>"; 
        $cartasEchadas[] = $nombreCarta; //Guarda en el array cada carta que se heche y no esté repetida
        $contadorCartasEchadas++;
        $puntosTotales += $puntosCarta;
      }
      
    }
      
    echo "<br><b>Total: $puntosTotales puntos</b>";
    

    }
    ?>
    
  </body>

</html>
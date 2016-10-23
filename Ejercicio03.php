<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Piezas de ajedrez</title>

  </head>
  <body>
    <?php
      //Array de piezas y valores
      $piezas = [
        "dama" => "9 peones",
        "torre" => "5 peones",
        "alfil" => "3 peones",
        "caballo" => "2 peones",
        "peon" => "1 peones",
      ];
      //Cantidad de piezas para el jugador 1
      $cantidadPiezasJ1 = [
        "dama negro" => 1,
        "torre negro" => 2,
        "alfil negro" => 2,
        "caballo negro" => 2,
        "peon negro" => 8,
      ];
      //Cantidad de piezas para el jugador 2
      $cantidadPiezasJ2 = [
        "dama blanco" => 1,
        "torre blanco" => 2,
        "alfil blanco" => 2,
        "caballo blanco" => 2,
        "peon blanco" => 8,
      ];
      
      //Colores 
      $color = ["negro", "blanco"];
      
      //figuras
      $figuras = ["dama", "torre","alfil","caballo","peon"];
      $maximoFigurasJ1 = 4;
      $maximoFigurasJ2 = 4;

      echo "fichas capturadas: <br>";
         do{ 
      //Jugador 1

      $figuraCapturada = $figuras[rand(0, $maximoFigurasJ1)];   
      $ColorCapturado = $color[0];
      //Muestra al figura
      echo $figuraCapturada , " ",  $ColorCapturado ," ",$piezas[$figuraCapturada]; 
      $indice = $figuraCapturada . " "  . $ColorCapturado;
      $cantidadPiezasJ1[$indice]--;
   
      if( $cantidadPiezasJ1[$indice] == 0){
        $maximoFigurasJ1--;
      }
      
      echo "<br>";
      

      //jugador 2

      
      $figuraCapturada2 = $figuras[rand(0, $maximoFigurasJ2)];   
      $ColorCapturado2 = $color[1];
      //Muestra al figura
      echo $figuraCapturada2 , " ",  $ColorCapturado2, " ", $piezas[$figuraCapturada2]; 
      $indice2 = $figuraCapturada2 . " "  . $ColorCapturado2;
      $cantidadPiezasJ2[$indice2]--;
   
      if( $cantidadPiezasJ2[$indice2] == 0){
        $maximoFigurasJ2--;

      }
      
   echo "<br>";
}while($maximoFigurasJ2 >0 || $maximoFigurasJ1 > 0); 
    ?>
  </body>

</html>
<?php $ciudad = $_GET["ciudades"];?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>El tiempo en <?=$ciudad?></title>
  </head>
  <body>
    <h2>El tiempo en <?=$ciudad?></h2>
    <?php
      $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$ciudad,Spain&units=metric&appid=30d44ae7a7e20fd8aeecb88ab89da864");
      echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>";
      $tiempo = json_decode($datos);
      echo "<h3>Datos en un objeto: </h3>";
      print_r($tiempo);
      echo "<hr>";
      echo "<h3>Datos sueltos: </h3>";
      echo "Temperatura: ".$tiempo->{"main"}->{"temp"}."ºC<br>";
      echo "Humedad: ".$tiempo->{"main"}->{"humidity"}."%<br>";
      echo "Presión: ".$tiempo->{"main"}->{"pressure"}."mb<br>";
      echo "Velocidad del viento: ".$tiempo->{"wind"}->{"speed"}."km/h<br>";
      echo "Cielo: ".$tiempo->{"weather"}[0]->{"description"};
    ?>
  </body>
</html>

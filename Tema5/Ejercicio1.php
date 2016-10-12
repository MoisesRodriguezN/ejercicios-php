<?php
  for($i = 0; $i < 20; $i++){
    $numero[$i] = rand(0,100); 
    $cuadrado[$i] = $numero[$i]*$numero[$i];
    $cubo[$i] = $numero[$i]*$numero[$i]*$numero[$i];
  }
?>
<table>
  <tr><td>Número</td><td>Cuadrado</td><td>Cubo</td></tr>
<?php
  for ($i = 0; $i < 20; $i++) {
      echo "<tr><td>".$numero[$i]."</td>";
      echo "<td>".$cuadrado[$i]."</td>";
      echo "<td>".$cubo[$i]."</td></tr>";
  }
?>
</table>


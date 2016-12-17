<?php
  session_start();

  include_once 'DadoPoker.php';

  if (!isset($_SESSION[misDados])) {
    $_SESSION[misDados] = serialize(array(new DadoPoker(), new DadoPoker(), new DadoPoker(), new DadoPoker(), new DadoPoker()));
  }

  if (!isset($_SESSION[tiradasTotales])) {
    $_SESSION[tiradasTotales] = 0;
  }
  
  $misDados = unserialize($_SESSION[misDados]);
  DadoPoker::setTiradasTotales($_SESSION[tiradasTotales]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dados de Poker</title>
  </head>
  <body>
    <?php
      echo "Dados: ";

      foreach ($misDados as $dado) {
        $dado->tira();
        echo $dado->nombreFigura()," ";
      }
      
      echo "<br>Tiradas de dados totales: ".(DadoPoker::getTiradasTotales());
      echo "<br>Tiradas de cubilete: ".(DadoPoker::getTiradasTotales() / 5);

      $_SESSION[misDados] = serialize($misDados);
      $_SESSION[tiradasTotales] = DadoPoker::getTiradasTotales();
    ?>
  </body>
</html>

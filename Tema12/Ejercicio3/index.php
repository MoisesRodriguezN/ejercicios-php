<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Servicio web conversor euro pesetas</title>
    </head>
    <body>
        <?php
          $moneda = $_GET['moneda'];
          $cantidad = $_GET['cantidad'];
          if($cantidad>0){
            if($moneda=='euros'){
              $total = $cantidad*166.38;
              $resultado[] = [
                  'moneda' => 'pesetas',
                  'cantidad'=> number_format($total, 2, '.', '')
              ];
              echo json_encode($resultado);
            } else if($moneda=='pesetas'){
              $total = $cantidad/166.38;
              $resultado[] = [
                  'moneda' => 'euros',
                  'cantidad'=> number_format($total, 2, '.', '')
              ];
              echo json_encode($resultado);
            } else{
                echo "Tipo de moneda incorrecto. Solo es posible euro o pesetas";
            }
          } else {
              echo "La cantidad no puede ser menor a 0";
          }
          
        ?>
    </body>
</html>

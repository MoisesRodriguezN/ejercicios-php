<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          include_once 'Pinguino.php';
          include_once 'Gato.php';
          include_once 'Perro.php';
          include_once 'Lagarto.php';
          include_once 'Canario.php';
          
          $blanca = new Gato("hembra");
          $tom = new Gato("macho","Angora");
          $miCanario = new Canario("macho","Angora");
          $delta = new Perro("macho","Labrador");
          $pingu = new Pinguino("macho");
          $unLagarto = new Lagarto("macho");
         echo "Gato1: ", $blanca,"<br><br>";
          echo "Gato2: ",$tom,"<br><br>";
          echo "Canario: ",$miCanario,"<br><br>";
          echo "Perro: ",$delta,"<br><br>";
          echo "Lagarto: ",$unLagarto,"<br><br>";

          echo $blanca->come()."<br>";
          echo $blanca->maulla()."<br>";
          echo $tom->afilarUnias()."<br>";

          echo $miCanario->agitarAlas()."<br>";

          echo $delta->ladra()."<br>";

          echo $pingu->agitarAlas()."<br>";
          
          echo $unLagarto->escondete()."<br>";

        ?>
    </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Diccionario Español-Ingles</title>  
  </head>
  <body>
    <?php
      $palabras= array (
        'puerta' => 'door', 'zapatos' => 'shoes', 'lápiz' =>'pencil', 'cuaderno' => 'notebook', 'ventana' => 'window',
        'oso' => 'bear', 'agua' => 'water', 'oreja' => 'ear', 'mano' => 'hand', 'teclado' => 'keyboard',
        'perro' => 'dog', 'gato' => 'cat', 'serpiente' => 'snake', 'hielo' => 'ice', 'libro' => 'book',
        'ojo' => 'aye', 'árbol' => 'tree', 'bosque' => 'forest', 'fuego' => 'fire', 'cara' => 'face');
      
        foreach ($palabras as $key => $value) {
            $palabraEspanol[]=$key;
        }
        
        $ingles = $_GET["ingles"];
        
        if(!isset($ingles)){
        ?>
      
    <?php
        $espanol = [];//Inicializo el array de palabrasGeneradas
        for ($i = 0; $i < 5; $i++){
            do{
            $palabra=$palabraEspanol[rand(0, 19)];//guarda palabra una palabra aleatoria
            }while(in_array($palabra, $espanol));//comprueba que este guardada en el array
            $espanol[]=$palabra;//si no esta dentro del array la guarda
        }   
          
      echo '<form action="index.php" method="get">';
      for ($i = 0; $i < 5; $i++) {
        echo $espanol[$i]." ";
        echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
        echo '<input type="text" name="ingles['.$i.']" ><br>';
      }
      
      echo '<input type="submit" value="Aceptar">';
      echo '</form>';
        }else{
          $espanol = $_GET['espanol'];
          $ingles = $_GET['ingles'];
          for ($i = 0; $i < 5; $i++) {
            if ($palabras[$espanol[$i]] == $ingles[$i]) {
              echo '<span style="color: green;">'.$espanol[$i].": ".$ingles[$i];
              echo " - correcto</span><br>";
            } else {
              echo '<span style="color: red;">'.$espanol[$i].": ".$ingles[$i];
              echo " - incorrecto</span>, la respuesta correcta es <b>".$palabras[$espanol[$i]]."</b><br>";
            }
          }
        }
    
    ?>
  </body>
</html>
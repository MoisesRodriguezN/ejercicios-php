<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Diccionario Español-Ingles</title>
        <style>
        </style>
        
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
        
        $palabraIntroducida = $_GET["palabraIntroducida"];
        
        if(!isset($palabraIntroducida)){
        ?>
      
    <?php
        $palabrasGeneradas = [];//Inicializo el array de palabrasGeneradas
        for ($i = 0; $i < 5; $i++){
            do{
            $palabra=$palabraEspanol[rand(0, 19)];//guarda palabra una palabra aleatoria
            }while(in_array($palabra, $palabrasGeneradas));//comprueba que este guardada en el array
            $palabrasGeneradas[]=$palabra;//si no esta dentro del array la guarda
        }   
          
      echo '<form action="pagina.php" method="get">';
      for ($i = 0; $i < 5; $i++) {
        echo $espanol[$i]." ";
        echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
        echo '<input type="text" name="ingles['.$i.']" ><br>';
      }
        }else{
            
        }
    
    ?>
  </body>

</html>

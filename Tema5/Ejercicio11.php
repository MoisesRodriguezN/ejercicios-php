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
      $palabraEspanol =  $_GET['palabraEspanol'];
      
      if(isset($palabraEspanol)){ //Si se ha enviado una palabra
        $palabraIngles = $palabras[$palabraEspanol]; //Guarda la palabra en ingles
        if(isset($palabraIngles)){ //Si hay palabra en ingles
          echo "$palabraEspanol en Inglés es: $palabraIngles";
        }
          
      }else{ 
        ?>
        <form action="Ejercicio11.php" method="get" id="palabraEnEspanol">
          Selecciona una palabra en español.
          <select  name="palabraEspanol" form="palabraEnEspanol">
            <?php
              foreach ($palabras as $key => $value) {
            ?>
              <option value="<?php echo $key ?>"><?php echo $key ?></option>
            <?php
              }
            ?>
          </select> 
          <input type="submit" value="Aceptar">
        </form>
        <?php
      }
  
      ?>
    
  </body>

</html>
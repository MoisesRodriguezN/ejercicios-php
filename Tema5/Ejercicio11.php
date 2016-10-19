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
      $palabraEspañol =  $_GET['palabraEspañol'];
      
      if(isset($palabraEspañol)){ //Si se ha enviado una palabra
        $palabraIngles = $palabras[$palabraEspañol]; //Guarda la palabra en ingles
        if(isset($palabraIngles)){ //Si hay palabra en ingles
          echo "$palabraEspañol en Inglés es: $palabraIngles";
        }else{
          echo "$palabraEspañol no se encuentra en el diccionario.";
        }
          
        
      }else{ 
        ?>
        <form action="Ejercicio11.php" method="get">
          Introduce una palabra en español.
          <input type="text" autofocus name="palabraEspañol"><br>
          <input type="submit" value="Aceptar">
        </form>
        <?php
      }
  
      ?>
    
  </body>

</html>
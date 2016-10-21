<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Traduce 5 palabras del Español al Inglés</title>
        <style>
        </style>  
  </head>
  <body>
    <?php
      $palabras= array (
        'puerta' => 'door', 'zapatos' => 'shoes', 'lapiz' =>'pencil', 'cuaderno' => 'notebook', 'ventana' => 'window',
        'oso' => 'bear', 'agua' => 'water', 'oreja' => 'ear', 'mano' => 'hand', 'teclado' => 'keyboard',
        'perro' => 'dog', 'gato' => 'cat', 'serpiente' => 'snake', 'hielo' => 'ice', 'libro' => 'book',
        'ojo' => 'aye', 'arbol' => 'tree', 'bosque' => 'forest', 'fuego' => 'fire', 'cara' => 'face');
      
      foreach ($palabras as $clave => $valor) {
        $palabrasEspanol[] = $clave;
      }
      
      $palabraIntroducida =  $_GET['palabraIntroducida'];
      $palabrasString =  $_GET['palabrasString'];
      $numeroPalabras =  $_GET['numeroPalabras'];
      $indice = 0;
      
      if (!isset($palabraIntroducida)){
        //Primera visita
        $palabrasString = "";
      }
      if(isset($palabraIntroducida)){
        $palabrasString.= " " . $palabraIntroducida;
        $numeroPalabras +=1;
      }
      
      if(!isset($palabraIntroducida)){
 
      $palabrasGeneradas = [];
      for ($i = 0; $i < 5; $i++){
        do{
          $palabra =  $palabrasEspanol[rand(0, 19)]; //Guarda una palabra aleatoria
        }while(in_array($palabra, $palabrasGeneradas)); //Comprueba que esté guardada en el array
        $palabrasGeneradas[] = $palabra; //Si no está la guarda.

        ?> 
    
    <?php
      
      }
    ?> 

      
    <?php
 
    }
      
      if ($numeroPalabras == 5){
      $palabrasString = substr($palabrasString, 1);
      $arrayPalabras= explode(" ", $palabrasString);
      for ($i = 0; $i < 5; $i++){
        if($palabras[$palabrasGeneradas[$i]] == $arrayPalabras[$i]){
          $correctas +=1;
        }
      }
      
      echo "has acertado " , $correctas , " palabras";
    }
    
    echo  $palabrasGeneradas[$indice];
    $indice+=1;
    ?>
    
    <form action="Ejercicio12.php" method="get">      
      <input type="text" autofocus name="palabraIntroducida"><br>
      <input type="hidden" name="palabrasString" value="<?php echo $palabrasString; ?>">
      <input type="hidden" name="numeroPalabras" value="<?php echo $numeroPalabras; ?>">
      <input type="hidden" name="palabraIntroducida" value="<?php echo $palabraIntroducida; ?>">
      <input type="hidden" name="correctas" value="<?php echo $correctas; ?>">
      <input type="submit" value="Aceptar">  
    </form>
    
    <?php
      /*echo "<pre>";

        var_dump($palabrasEspañol);

      echo "</pre>";
      */
      
      /*
      $palabraEspañol =  $_GET['palabraEspañol'];
       
      if(isset($palabraEspañol)){ //Si se ha enviado una palabra
        $palabraIngles = $palabras[$palabraEspañol]; //Guarda la palabra en ingles
        if(isset($palabraIngles)){ //Si hay palabra en ingles
          echo "$palabraEspañol en Inglés es: $palabraIngles";
        }
      
        
      }else{ 
        ?>
        <form action="Ejercicio12.php" method="get" id="palabraEnEspañol">
          Selecciona una palabra en español.
          <select  name="palabraEspañol" form="palabraEnEspañol">
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
       */
      ?>
  </body>

</html>
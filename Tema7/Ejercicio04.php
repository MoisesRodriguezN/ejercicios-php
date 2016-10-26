<?php
  session_start(); // Inicio de sesión
  if(!isset($_SESSION['logueado'])) {
    $_SESSION['logueado'] = false;
  }    
?>
<!DOCTYPE html>
 
<html>
  <head>
    <title>Login con sesiones</title>
    <meta charset="UTF-8">
  </head>
  <body>    

    <?php
      $usuario = $_GET['usuario'];
      $clave= $_GET['clave'];
      
      if ((isset($usuario) && isset($clave)) || $_SESSION['logueado']==true){
        if (($usuario == "moises" && $clave == "miclave123") || $_SESSION['logueado']==true){
          $_SESSION['logueado'] = true;
          echo "Inicio Correcto";
          header("Refresh: 3; url=Ejercicio04_logueado.php", true, 303);
        }else{
          echo "Usuario o Contraseña incorrecto";
          header("Refresh: 3; url=Ejercicio04.php", true, 303);
        }
      }else{
        
        ?>
          <form action="Ejercicio04.php" method="get">
            Usuario: <input type="text" name="usuario" autofocus="">
            Contraseña: <input type="password" name="clave" >
            <input type="submit" value="Entrar">
          </form>
        <?php
      }
      
    ?>
  </body>
</html>
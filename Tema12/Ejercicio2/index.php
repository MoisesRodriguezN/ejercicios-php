<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi usuario de Instagram</title>
    </head>
    <body>
        <?php
          $datos = file_get_contents("https://api.instagram.com/v1/users/self/?access_token=4477681620.683963e.c2059846922c48f6b7cb0f5876bfbb60");
          echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>";
          $usuario = json_decode($datos);
          echo "<h3>Datos en un objeto: </h3>";
          print_r($usuario);
          echo "<hr>";
          echo "<h3>Datos sueltos: </h3>";
          echo "<strong>ID de usuario: </strong>".$usuario->{"data"}->{"id"}."<br>";
          echo "<strong>Nombre Completo: </strong>".$usuario->{"data"}->{"full_name"}."<br>";
          echo "<strong>Usuario: </strong>".$usuario->{"data"}->{"username"}."<br>";
          echo "<strong>Biografia: </strong>".$usuario->{"data"}->{"bio"}."<br>";
          echo "<strong>Sitio Web: </strong>".$usuario->{"data"}->{"website"}. "<br>";
          echo "<strong>Seguidores: </strong>".$usuario->{"data"}->{"counts"}->{"followed_by"}. "<br>";
          echo "<strong>Sigue a: </strong>".$usuario->{"data"}->{"counts"}->{"follows"}. "<br>";
          echo "<strong>Publicaciones: </strong>".$usuario->{"data"}->{"counts"}->{"media"}. "<br>";
          echo "<strong>Foto de perfil:</strong> <br>";
        ?>
        
        <img src="<?=$usuario->{"data"}->{"profile_picture"}?>" alt="Foto de perfil" 
    </body>
</html>

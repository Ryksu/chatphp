<?php
session_start();

require 'php/conexion.php';
$msg = '';

 $conexion = conectar();

 if (isset($_POST['iniciar'])) {
    $user = $_POST['user'];
    $passwd = $_POST['password'];
    $_SESSION['user'] = $_POST['user'];

    # Vemos si no esta vacio ejecutara la sentencia en caso contrario saltara un error;
    if (  ((!empty($user)) && (!empty($passwd))) ) {

      $query = "SELECT * FROM Usuarios WHERE user = '$user' AND password = '$passwd'";

      // Conectamos a la base de datos  y hacemos la query;
     $stmt = $conexion -> prepare($query);

     // ejecutamos la query
     $stmt -> execute();

     // si el resultado es true nos redirige a chat.php  en caso contrario  volvemos al login.php;
     $res = $stmt -> fetch();

     if ($res){
      header("Location: pg/chat.php");
        exit();
     }
    }
    else {
      $msg .= "error usuario y/o contraseña incorrecta";
    }

 }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilo_login.css">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  </head>
  <body>
    <div id="contenedor">
      <header>
        <h1>Muchat.ga</h1>
      </header>
    <form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="titulo">
        <h2>Login</h2>
      </div>
      <div class="usuario">
      <label class="icon-user"></label>
      <input type="text" name="user" value="" placeholder="Usuario">
    </div>
    <div class="password">
      <label class="icon-password"></label>
      <input type="password" name="password" value="" placeholder="Contraseña">
    </div>
    <!-- si tienes errores la variable msg -->
    <?php if(!empty($msg)): ?>
    <div class="error">
      <label><?php echo $msg; ?></label>
    </div>
   <?php endif; ?>
    <div class="boton">
      <div class="registro">
        <a href="pg/registro.php">Registrar</a>
      </div>
      <input type="submit" name="iniciar" value="inicar sesión" class="iniciar">
    </div>
    </form>
  </div>
  </body>
</html>

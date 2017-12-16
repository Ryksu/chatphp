<?php
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
require '../php/conexion.php';
$conexion = conectar();

if (isset($_POST['enviar'])) {
  $user = $_POST['user'];
  $passwd = $_POST['password'];
  $email = $_POST['email'];
  $years = $_POST['years'];


  $query = "INSERT INTO Usuarios(user,password,email,years) VALUES('".$user."','".$passwd."','".$email."','".$years."')";
  $sql = $conexion->prepare($query);
  $sql->execute();
  header("location:../login.php");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_registro.css">
  </head>
  <body>
    <div id="contenedor">
      <header>
        <h1>Muchat.ga</h1>
      </header>
      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="titulo">
          <h2>Registro</h2>
        </div>
        <div class="usuario">
          <label class="icon-user"></label>
          <input type="text" name="user" value="" placeholder="Escribe el usuario que desees" maxlength="16" required>
        </div>
        <div class="password">
          <label class="icon-password"></label>
          <input type="password" name="password" value="" maxlength="16" placeholder="Contraseña" required>
        </div>
        <div class="email">
          <label class="icon-email"></label>
         <input type="email" name="email" value="" placeholder="email" maxlength="36" required>
        </div>
        <div class="years">
          <label class="icon-years"></label>
          <input type="date" name="years" value="" required>
        </div>
        <div class="boton">
          <div class="volver">
            <a href="../login.php">Volver</a>
          </div>
          <input type="submit" name="enviar" value="Registrarse">
        </div>

      </form>
    </div>

  </body>
</html>

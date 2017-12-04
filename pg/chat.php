<?php

#Esto visualiza si hay un error
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);

session_start();
$msg = "";
if (!isset($_SESSION['user'])) {
  header('Location:../login.php');
}
$user = $_SESSION['user'];
require '../php/conexion.php';
// conectamos a la base de datos;
$conexion = conectar();
if (isset($_POST['enviar'])) {
  $mgs = $_POST['mensaje'];
  $query = "INSERT INTO Mensajes(user_name,mensajes) VALUES('".$user."','".$mgs."')";
	$sql = $conexion -> prepare($query);
  $sql->execute();
}
if (!isset($_FILES["imagen"])|| $_FILES["imagen"]["error"]>0) {
  $msg .= " Ha ocurrido un error ";
}else {
  $permitidos = array("image/jpg","image/jpeg","image/gif","image/png");
  $limite_kb = 16384;

  if (in_array($_FILES['imagen']['type'],$permitidos)&& $_FILES['imagen']['size']<= $limite_kb * 1024) {
    $imagen_temporal = $FILES['imagen']['tmp_name'];
    $tipo = $_FILES['imagen']['type'];

    $fp = fopen($imagen_temporal,'r+b');
    $data = fread($fp, filesize($imagen_temporal));
    fclose($fp);
    $data = quote($data);
    $query = "INSERT INTO Imagenes(imagen,tip_imagen) VALUES('".$data."','".$tipo_imagen."')";
    $sql = $conexion->prepare($query);
    $sql->execute();
  }


}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat</title>
    <link rel="stylesheet" href="../css/estilo_chat.css">
    <link rel="stylesheet" href="../css/estilo_nombre.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <div class="contenedor">

      <div class="chat">
       <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
         <div class="mensajes">
<!--  Chat -->
           <div  id="chatbox">

           </div>
       </div>
      <div class="msg">
      <label class="icon-imagen"></label>
       <input type="file" name="imagen" value="imagen">
       <?php if(!empty($msg)): ?>
         <div class="error">
           <label><?php echo $msg; ?></label>
         </div>
      <?php endif; ?>
        <input type="text" name="mensaje" value="" class="texto" placeholder="Escribe un mensaje..." ></input>
        <input type="submit" name="enviar" value="enviar" class="boton">
      </div>

       </form>
      </div>
      <div class="cerrar">
        <a href="../php/logout.php">Cerrar sesión</a>
      </div>
    </div>

    <script src="../js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="../js/auto_refresh.js" charset="utf-8"></script>


  </body>
</html>

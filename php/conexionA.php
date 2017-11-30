<?php
// Iniciamos session;
session_start();
$_SESSION["user"] = $_POST["user"];
// Datos de la base de datos
$nombre_servidor = "localhost";
$nombre_usuario = "admin";
$password = "abc123.";
$baseD = "Chat";


//Comprobamos si el usuario incia sesion los datos
try{
  $conexion = new PDO("mysql:host=$nombre_servidor;dbname=$baseD",$nombre_usuario,$password);
  //Comprobamos la conexión del servidor
  if ($conexion->connect_errno) {
    echo "Fallo en la base de datos: (". $conexion->connect_errno .")" .$conexion->connect_error;
  }
} catch(PDOException $e){
  echo "Fallo en la base de datos: " . $e -> getMessage();
}

if(isset($_POST["iniciar"])){

  $user = $_POST["user"];

  $passwd = $_POST["password"];

  $consulta = "SELECT * FROM Usuarios WHERE user = '$user' AND password = '$passwd'";

  // Conectamos a la base de datos  y hacemos la consulta;
 $stmt = $conexion -> prepare($consulta);

 // ejecutamos la consulta
 $stmt -> execute();

 // si el resultado es true nos redirige a chat.php  en caso contrario  volvemos al login.php;
 $res = $stmt -> fetch();
 if ($res){
  header("Location: ../pg/chat.php");
    exit();
}else{

  header("Location: ../login.php");
    exit();
  }
}





 ?>

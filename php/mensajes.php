<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['user'])) {
  header('location:../login.php');
}
$conexion = conectar();
$query = "SELECT * FROM Mensajes";
$sql = $conexion-> prepare($query);
$sql->execute();
$res = $sql->fetchAll();

foreach ($res as $row) {
  echo '<div class="chatting">
  <p><span class="color"><b>'.$row['user_name'].'</b></span>: '. $row['mensajes'].'<span class="hora">'.$row['hora'].'</span></p>
  </div>';
}
?>

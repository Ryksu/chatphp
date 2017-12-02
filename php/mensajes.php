<?php
require 'conexion.php';
session_start();
$user = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
  header('location:../login.php');
}
$conexion = conectar();
$query = "SELECT * FROM Mensajes";
$sql = $conexion-> prepare($query);
$sql->execute();
$res = $sql->fetchAll();

foreach ($res as $row) {
  echo '<article class="chating">
  <p><span id='."$user".'><b>'.$row['user_name'].'</b></span>: '. $row['mensajes'].'</p>
  </article>';
}
exit();
?>

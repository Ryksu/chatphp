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
  echo '<p><b>'.$row['user_name'].'</b>: '. $row['mensajes'].'</p>';
}
?>

<?php
require 'conexion.php';
$conexion = conectar();
$query = "SELECT * FROM Mensajes";
$sql = $conexion-> prepare($query);
$sql->execute();
$res = $sql->fetchAll();

foreach ($res as $row) {
  echo $row['user_name'].': '. $row['mensajes']."\n";
}
?>

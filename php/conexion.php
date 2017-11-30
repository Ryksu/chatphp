<?php
function conectar()
{
  //Definimos la variables del server;
  $nombre_db = 'localhost';
  $nombre_user = 'admin';
  $password = "abc123.";
  $baseD = 'Chat';

  try {
    $conexion = new PDO("mysql:host=$nombre_db;dbname=$baseD",$nombre_user,$password);

  } catch (PDOException $e) {
    echo "Fallo en la base de datos: " . $e -> getMessage();

  }
  return $conexion;
}
 ?>

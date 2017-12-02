<?php
session_start();
$user = $_SESSION['user'];
header("Content-type: text/css");
$color[0]='#bfb486';
$color[1]='#99827c';
$color[2]='#3e6c55';
$color[3]='#5320c4';
$color[4]='#0eb6da';
$i = rand(0,4);

echo "
#$user{
  color:$color[$i];
}

";
?>

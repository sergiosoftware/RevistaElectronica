<?php
include_once("Articulo.php");
$nombre=basename($_REQUEST['nombre']);
$enlace = "../Articulos/".$nombre;
header("Content-Type: application/force-download");
header("content-Disposition:attachment; filename=".$nombre);
header('Content-Transfer-Encoding: binary');
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>
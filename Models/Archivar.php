<?php
include_once("../Models/Articulo.php");
$ruta="../Articulos/";
opendir($ruta);
$destino=$ruta.$_FILES['foto']['name'];
copy($_FILES['foto']['tmp_name'],$destino);
$nombres=$_FILES['foto']['name'];
$titulo=$_REQUEST['titulo'];
$tema=$_REQUEST['temas'];
$palabrasclave=$_REQUEST['palabrasClave'];
$resumen=$_REQUEST['texto'];
$nomarchivo=$_FILES['foto']['name'];
session_start();
$user=$_SESSION['usuario'];
$articulo=new Articulo($titulo,$tema,$palabrasclave,$resumen,$destino,$user,$nomarchivo,"","");
$obj=$articulo->ingresar();
header("Location:http:../Views/perfilAutor.php");
?>
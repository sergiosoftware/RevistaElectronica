<?php
include_once("Asignacion.php");
$numasignacion=$_REQUEST['numasignacion'];	
$E=new Asignacion("","");
$CRUDeli=$E->eliminar($numasignacion);
?>
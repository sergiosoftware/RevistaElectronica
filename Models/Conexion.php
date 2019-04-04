<?php
class Conexion{
	public function __construct(){
	$this->Conexion='';
	}
	public function conectar(){
	$this->Conexion=pg_connect("dbname=revista user=revista password=programacionIII");
	if(!$this->Conexion)
		echo json_encode("Error al conectar");
	}	
	public function __destruct(){
	$this->Conexion;
	}	
	
	}
?>
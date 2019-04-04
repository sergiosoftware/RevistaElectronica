<?php
include_once("Conexion.php");
class Calificacion{
	var $numeroarticulo;
	var $comentarios;
	var $sugerencias;
	var $calificacion;
	var $usuario;
	var $conect;
	public function __construct($numeroarticulo,$comentarios,$sugerencias,$calificacion,$usuario){
		$this->numeroarticulo=$numeroarticulo;
		$this->comentarios=$comentarios;
		$this->sugerencias=$sugerencias;
		$this->calificacion=$calificacion;
		$this->usuario=$usuario;
	}
	public function ingresar(){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="insert into calificaciones values(default,$this->numeroarticulo,'$this->comentarios','$this->sugerencias',$this->calificacion,'$this->usuario');";
		pg_exec($Sql);
        return("Calificacion Recibida");
	}
	public function consultaCalificacion(){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="select numeroarticulo, count(numeroarticulo) as cantidad,avg(calificacion) as promedio from calificaciones group by numeroarticulo having count(numeroarticulo)=3";	
		$Registros=pg_exec($Sql);
		return($Registros);
	}
	public function consultaNotificacion($numa){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="select avg(calificacion) as promedio from calificaciones group by numeroarticulo having numeroarticulo='".$numa."';";	
		$Registros=pg_exec($Sql);
		return($Registros);
	}
	public function consultarComentarios($numa){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="select comentarios,sugerencias from calificaciones where numeroarticulo='".$numa."';";
		$Registros=pg_exec($Sql);
		return($Registros);	
	}
	//set  y get
	public function getNumeroarticulo(){
		return($this->numeroarticulo);	
	}
	public function getComentarios(){
		return($this->comentarios);	
	}
	public function getSugerencias(){
		return($this->sugerencias);	
	}
	public function getCalificaciones(){
		return($this->calificacion);	
	}
	public function getUsuario(){
		return($this->usuario);	
	}
	public function __destruct(){
		$this->numeroarticulo;
		$this->comentarios;
		$this->sugerencias;
		$this->calificacion;
		$this->usuario;
	}
}
?>
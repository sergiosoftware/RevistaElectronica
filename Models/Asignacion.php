<?php
include_once("Conexion.php");
class Asignacion{
	var $articulo;
	var $evaluador;
	var $conect;
	public function __construct($articulo,$evaluador){
		$this->articulo=$articulo;
		$this->evaluador=$evaluador;
	}
	public function ingresar(){		
        $conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="insert into asignaciones values(default,'$this->articulo','$this->evaluador');";
		pg_exec($Sql);
        return(1);
	}
	public function consultaAsignacion($user){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="select a.numeroarticulo,ar.titulo,ar.temas,ar.nomarchivo,ar.estado from asignaciones
		a, articulos ar where a.numeroarticulo=ar.numeroarticulo and a.usuario='".$user."';";
		$Registros=pg_exec($Sql);
		return($Registros);
	}
	public function consultarCantidad(){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="select numeroarticulo,count(numeroarticulo) as cantidad from asignaciones group by numeroarticulo";
		$Registros=pg_exec($Sql);
		return($Registros);
	}
	public function consultar(){
		$conect=new Conexion();
        $variable=$conect->conectar();
		$Sql="select * from asignaciones";
		$Registros=pg_exec($Sql);
		return($Registros);	
	}
	public function modificar($numa){
		$conect=new Conexion();
		$variable=$conect->conectar();
		$Sql="Update asignaciones set numeroarticulo='$this->articulo',usuario='$this->evaluador'where numasignacion='".$numa."';";
		$Registros=pg_exec($Sql);
        return($Registros);
	}
	public function eliminar($numa){
		$conect=new Conexion();
		$variable=$conect->conectar();
		$Sql="delete from asignaciones where numasignacion= '".$numa."';";
		pg_exec($Sql);
	}	
	//set  y get
	public function getArticulo(){
		return($this->articulo);
	}
	public function getEvaluador(){
		return($this->evaluador);
	}
	public function __destruct(){
		$this->articulo;
		$this->evaluador;
	}
}
?>
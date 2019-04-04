<?php
include_once("Conexion.php");
class Notificacion{
    var $numeroArticulo;
    var $Decision;
    var $conect;
    public function __construct($numeroArticulo,$Decision){
        $this->numeroArticulo=$numeroArticulo;
        $this->Decision=$Decision;
    }
    public function ingresar(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="insert into notificaciones values(default,'$this->numeroArticulo','$this->Decision'):";
        pg_exec();
    }
    public function consultaAceptadas($aceptado){
		$conect=new Conexion();
		$variable=$conect->conectar();
		$Sql="select numarticulo,decision from notificaciones where decision='".$aceptado."';";
		$Registros=pg_exec($Sql);
		return($Registros);
	}
	public function consultaNotificacion($user){
		$conect=new Conexion();
		$variable=$conect->conectar();
		$Sql="select a.numarticulo,a.decision,ar.titulo from notificaciones a, articulos ar where a.numarticulo=ar.numeroarticulo and ar.usuario='".$user."';";
		$Registros=pg_exec($Sql);
		return($Registros);
	}
}
?>
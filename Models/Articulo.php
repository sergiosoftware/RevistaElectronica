<?php
include_once("Conexion.php");

class Articulo{
    var $titulo;
    var $tema;
    var $palabrasclave;
    var $resumen;
    var $destino;
    var $user;
    var $nomarchivo;
    var $conect;
    public function __construct($titulo,$tema,$palabrasclave,$resumen,$destino,$user,$nomarchivo){
        $this->titulo=$titulo;
        $this->tema=$tema;
        $this->palabrasclave=$palabrasclave;
        $this->resumen=$resumen;
        $this->destino=$destino;
        $this->user=$user;
        $this->nomarchivo=$nomarchivo;
    }
    public function ingresar(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="insert into articulos values(default,'$this->titulo','$this->tema','$this->palabrasclave','$this->resumen','$this->destino','$this->user','$this->nomarchivo');";
        pg_exec($Sql);
        echo json_encode("Recibido");
    } 
    public function consultar($user){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select estado from articulos where usuario='".$user."';";
        $Registros=pg_exec($Sql);
        return($Registros);
    }
    public function consultarAsignar(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select numeroarticulo,titulo,nomarchivo,estado from articulos";
        $Registros=pg_exec($Sql);
        return($Registros);
    }
    public function consultaModificar(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select numeroarticulo,titulo,temas,palabrasclave,usuario from articulos";
        $Registros=pg_exec($Sql);
        return($Registros);
    }
    public function modificar($numa){
         $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Update articulos set titulo='$this->titulo',temas='$this->tema',palabrasclave='$this->palabrasclave' where numeroarticulo='".$numa."';";
        pg_exec($Sql);
        return("Actualizado");
    }
}

?>
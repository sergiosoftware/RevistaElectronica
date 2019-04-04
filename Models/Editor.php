<?php
include_once("Conexion.php");
class Editor{
    var $usuario;
    var $contrasena;
    var $nombre;
    var $apellidos;
    var $estudios;
    var $conect;
    
    public function __construct($usuario,$contrasena,$nombre,$apellidos,$estudios){
        $this->usuario=$usuario;
        $this->contrasena=$contrasena;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->estudios=$estudios;
    }
    public function RegistrarEditor(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="insert into ingresoeditor values('$this->usuario','$this->contrasena','$this->nombre','$this->apellidos','$this->estudios');";
        echo json_encode($Sql);
        pg_exec($Sql);
    }
    public function LoginEditor(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select usuario from ingresoeditor where usuario='$this->usuario' and contrasena='$this->contrasena';";
        $Registros=pg_exec($Sql);
        return ($Registros);
    }
}
?>
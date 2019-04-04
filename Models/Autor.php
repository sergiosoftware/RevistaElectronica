<?php
include_once("Conexion.php");
class Autor{
    var $usuario;
    var $contrasena;
    var $nombre;
    var $apellidos;
    var $direccion;
    var $telefono;
    var $departamento;
    var $institucion;
    var $email;
    var $conect;
    
    public function __construct($usuario,$contrasena,$nombre,$apellidos,$direccion,$telefono,$departamento,$institucion,$email){
        $this->usuario=$usuario;
        $this->contrasena=$contrasena;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->departamento=$departamento;
        $this->institucion=$institucion;
        $this->email=$email;
        $this->R="";
    }
    
    //Registrar Nuevo Autor
    public function RegistrarA(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="insert into ingresoautor values('$this->usuario','$this->contrasena','$this->nombre','$this->apellidos','$this->direccion','$this->telefono','$this->departamento','$this->institucion','$this->email');";
        echo json_encode($Sql);
        pg_exec($Sql);
    }
    //Login Autor
    public function LoginAutor(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select usuario from ingresoautor where usuario='$this->usuario' and contrasena ='$this->contrasena';";
        $Registros=pg_exec($Sql);
        return ($Registros);
    }
    
}

?>
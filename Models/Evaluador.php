<?php   
include_once("Conexion.php");
class Evaluador{
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
    public function RegistrarEvaluador(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="insert into ingresoevaluador values('$this->usuario','$this->contrasena','$this->nombre','$this->apellidos','$this->estudios');";       
        $R=pg_exec($Sql);
        echo json_encode($R);
    }
    public function LoginEvaluador(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select usuario from ingresoevaluador where usuario='$this->usuario' and contrasena='$this->contrasena';";
        $Registros=pg_exec($Sql);
        return ($Registros);
    }  
    public function ConsultarAsignar(){
        $conect=new Conexion();
        $variable=$conect->conectar();
        $Sql="Select usuario,nombre,apellido,estudio from ingresoevaluador";
        $Registros=pg_exec($Sql);
        return($Registros);
    }
}
?>
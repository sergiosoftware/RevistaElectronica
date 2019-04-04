<?php
include_once("../Models/Autor.php");
include_once("../Models/Evaluador.php");
include_once("../Models/Editor.php");
include_once("../Models/Articulo.php");
include_once("../Models/Notificacion.php");
include_once("../Models/Asignacion.php");
include_once("../Models/Calificacion.php");

class controladora{
    public function RegistrarAutor($usuario,$contrasena,$nombre,$apellidos,$direccion,$telefono,$departamento,$institucion,$email){
        $autor=new Autor($usuario,$contrasena,$nombre,$apellidos,$direccion,$telefono,$departamento,$institucion,$email);
        $autor->RegistrarA();
    }
    public function LoginAutor($usernameAutor,$passwordAutor){
        $autor=new Autor($usernameAutor,$passwordAutor,"","","","","","","");
        $Registros=$autor->LoginAutor();
        $Datos=pg_num_rows($Registros);
        if($Datos>0){
			session_start();
			$_SESSION['usuario'] = $usernameAutor;
			echo json_encode($usernameAutor);
		}else{
			echo json_encode(0);
		}
    }
    public function RegistrarEvaluador($usuario,$contrasena,$nombre,$apellidos,$estudios){
        $evaluador=new Evaluador($usuario,$contrasena,$nombre,$apellidos,$estudios);
        $evaluador->RegistrarEvaluador();
    }
    public function LoginEvaluador($usernameEvaluador,$passwordEvaluador){
        $evaluador=new Evaluador($usernameEvaluador,$passwordEvaluador,"","","");
        $Registros=$evaluador->LoginEvaluador();
        $Datos=pg_num_rows($Registros);
        if($Datos>0){
            session_start();
            $_SESSION['usuario']=$usernameEvaluador;
            echo json_encode($usernameEvaluador);
        }else{
            echo json_encode(0);
        }
    }
    public function RegistrarEditor($usuario,$contrasena,$nombre,$apellidos,$estudios){
        $editor=new Editor($usuario,$contrasena,$nombre,$apellidos,$estudios);
        $editor->RegistrarEditor();
    }
    public function LoginEditor($usernameEditor,$passwordEditor){
        $editor=new Editor($usernameEditor,$passwordEditor,"","","");
        $Registros=$editor->LoginEditor();
        $Datos=pg_num_rows($Registros);
        if($Datos>0){
            session_start();
            $_SESSION['usuario']=$usernameEditor;
            echo json_encode($usernameEditor);
        }else{
            echo json_encode(0);
        }
    }
    public function CerrarSesion(){
        session_start();
		session_unset();
		session_destroy();
		echo json_encode(1);
    }
    public function ProcesarA(){
        session_start();
		$user=$_SESSION['usuario'];
		$A=new Articulo("","","","","","","","","");
		$Registros=$A->consultar($user);
		$Filas=pg_num_rows($Registros);
        if($Filas>0){
            echo json_encode("Recibido de $user");
            
        }else{
            echo json_encode("Error");
        }		
    }
    public function ConsultarNotificaciones(){
        $con=new Notificacion("","");
		session_start();
		$user=$_SESSION['usuario'];
		$Registros=$con->consultaNotificacion($user);
		$Filas=pg_numrows($Registros);
		for($cont=0;$cont<$Filas;$cont++){
			$vec=array(
				"numeroarticulo"=>"".pg_result($Registros,$cont,0),
				"decision"=>"".pg_result($Registros,$cont,1),
				"titulo"=>"".pg_result($Registros,$cont,2),);
			$M[$cont]=$vec;
		}
		$vec=$M;
		echo json_encode($vec);
    }
    public function ConsultarAsignaciones(){
        session_start();
        $user=$_SESSION['usuario'];
        $asignacion=new Asignacion("","");
        $Registros=$asignacion->consultaAsignacion($user);
        $Filas=pg_num_rows($Registros);
        for($cont=0;$cont<$Filas;$cont++){
			$vec=array(
				"numeroarticulo"=>"".pg_result($Registros,$cont,0),
				"titulo"=>"".pg_result($Registros,$cont,1),
				"temas"=>"".pg_result($Registros,$cont,2),
				"nombre"=>"".pg_result($Registros,$cont,3),
				"estado"=>"".pg_result($Registros,$cont,4),);
			$M[$cont]=$vec;
		}
        $vec=$M;
        pg_free_result($Registros);
        echo json_encode($M);
    }
    public function EnviarCalificacion($NumeroArticulo,$Comentario,$Sugerencia,$Calificacion){
        session_start();
        $usuario=$_SESSION['usuario'];
        $ingreso=new Calificacion($NumeroArticulo,$Comentario,$Sugerencia,$Calificacion,$usuario);
        $Registros=$ingreso->ingresar();
        echo json_encode($Registros);
    }
    public function ConsultarArticulos(){
        $art=new Articulo("","","","","","","");
        $Registros=$art->consultarAsignar();
        $Filas=pg_num_rows($Registros);
        for($cont=0;$cont<$Filas;$cont++){
			$vec=array("numeroarticulo"=>"".pg_result($Registros,$cont,0),
					   "titulo"=>"".pg_result($Registros,$cont,1),	
					   "nomarchivo"=>"".pg_result($Registros,$cont,2),
					   "estado"=>"".pg_result($Registros,$cont,3),
					  );
			$M[$cont]=$vec;
		}
		pg_FreeResult($Registros);
		$vec=$M;
		echo json_encode($vec);       
    }
    public function ConsultarEvaluadores(){
        $evaluador=new Evaluador("","","","","");
        $Registros=$evaluador->ConsultarAsignar();
        $Filas=pg_numrows($Registros);
		for($cont=0;$cont<$Filas;$cont++){
			$vec=array("usuario"=>"".pg_result($Registros,$cont,0),
					   "nombre"=>"".pg_result($Registros,$cont,1),	
					   "apellido"=>"".pg_result($Registros,$cont,2),
					   "estudio"=>"".pg_result($Registros,$cont,3),);
			$M[$cont]=$vec;
		}
		pg_FreeResult($Registros);
		$vec=$M;
		echo json_encode($vec);
    }
    public function AsignarArticulo($articulo,$evaluador){
        $asignacion=new Asignacion($articulo,$evaluador);
        $Registros=$asignacion->ingresar();
        echo json_encode($Registros);
    }
    public function ConsultarAsignacionesEvaluador(){
        $asignacion=new Asignacion("","");
        $Registros=$asignacion->consultar();
        $Filas=pg_num_rows($Registros);
        for($cont=0;$cont<$Filas;$cont++){
			$vec=array("numasignacion"=>"".pg_result($Registros,$cont,0),
					   "numeroarticulo"=>"".pg_result($Registros,$cont,1),
					   "usuario"=>"".pg_result($Registros,$cont,2),);
			$M[$cont]=$vec;
		}
		$vec=$M;
		echo json_encode($vec);
    }
    public function ModificarAsignacion($numeroAsignacion,$numeroArticulo,$nuevoEvaluador){
        $modificar=new Asignacion($numeroArticulo,$nuevoEvaluador);
        $respuesta=$modificar->modificar($numeroAsignacion);
        echo json_encode("Realizada");
    }
    public function ConsultarArticulosM(){
        $art=new Articulo("","","","","","","");
        $Registros=$art->consultaModificar();
        $Filas=pg_num_rows($Registros);
        for($cont=0;$cont<$Filas;$cont++){
			$vec=array("numeroarticulo"=>"".pg_result($Registros,$cont,0),
					   "titulo"=>"".pg_result($Registros,$cont,1),
					   "temas"=>"".pg_result($Registros,$cont,2),
					   "palabrasclave"=>"".pg_result($Registros,$cont,3),
					   "usuario"=>"".pg_result($Registros,$cont,4),);
			$M[$cont]=$vec;
		}
		$vec=$M;
		echo json_encode($vec);
    }
    public function ModificarArticulo($numeroArticulo,$titulo,$temas,$palabrasclave){
        $articulo=new Articulo($titulo,$temas,$palabrasclave,"","","","");
        $Registros=$articulo->modificar($numeroArticulo);
        echo json_encode($Registros);
    }
}

$controladora=new controladora();
switch($_REQUEST['funcion']){
    case 1:
        //Registrar Nuevo Autor
        $controladora->RegistrarAutor($_REQUEST['usuario'], $_REQUEST['contrasena'], $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['direccion'], $_REQUEST['telefono'], $_REQUEST['departamento'], $_REQUEST['institucion'], $_REQUEST['email']);
        break;
    case 2:
        //Loggear Autor
        $controladora->LoginAutor($_REQUEST['usernameAutor'],$_REQUEST['passwordAutor']);
        break;
    case 3:        
        //Cerrar Sesion Autor
        $controladora->CerrarSesion();
        break;
    case 4:
        //Registrar Nuevo Evaluador
        $controladora->RegistrarEvaluador($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['estudios']);
        break; 
    case 5:
        //Loggear Evaluador
        $controladora->LoginEvaluador($_REQUEST['usernameEvaluador'],$_REQUEST['passwordEvaluador']);
        break; 
    case 6:
        //Cerrar Sesion Evaluador
        $controladora->CerrarSesion();
        break;
    case 7:
        //Registar Nuevo Editor
        $controladora->RegistrarEditor($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['estudios']);
        break;
    case 8:
        //Loggear Editor
        $controladora->LoginEditor($_REQUEST['usernameEditor'],$_REQUEST['passwordEditor']);
        break;
    case 9:
        //Cerrar Sesion Editor
        $controladora->CerrarSesion();
        break;
    case 10:
        //Procesar Articulo 
        $controladora->ProcesarA();
        break;
    case 11:
        //Consultar Notificaciones del Autor
        $controladora->ConsultarNotificaciones();
        break;
    case 12:
        //Consultar articulos asignados
        $controladora->ConsultarAsignaciones();
        break;
    case 13:
        //Enviar calificacion al editor del evaluador
        $controladora->EnviarCalificacion($_REQUEST['NumeroArticulo'],$_REQUEST['Comentario'],$_REQUEST['Sugerencia'],$_REQUEST['Calificacion']);
        break;
    case 14:
        //Consultar Articulos para asignarlos a par evaluador
        $controladora->ConsultarArticulos();
        break;
    case 15:
        //Consultar Evaluadores para asignarles articulo
        $controladora->ConsultarEvaluadores();
        break;
    case 16:
        //Realizar asignacion para evaluar
        $controladora->AsignarArticulo($_REQUEST['articulo'],$_REQUEST['evaluador']);
        break;
    case 17:
        //Consultar Asignaciones relizadas
        $controladora->ConsultarAsignacionesEvaluador();
        break;
    case 18:
        //Modificar Asignacion
        $controladora->ModificarAsignacion($_REQUEST['numeroAsignacion'],$_REQUEST['numeroArticulo'],$_REQUEST['nuevoEvaluador']);
        break;
    case 19:
        //Consultar Articulos para modificar
        $controladora->ConsultarArticulosM();
        break;
    case 20:
        //Modificar Articulo
        $controladora->ModificarArticulo($_REQUEST['numeroArticulo'],$_REQUEST['titulo'],$_REQUEST['temas'],$_REQUEST['palabrasclave']);
        break;
}


?>
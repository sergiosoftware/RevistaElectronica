<?php
include_once("../Models/Autor.php");
include_once("../Models/Evaluador.php");
include_once("../Models/Editor.php");
include_once("../Models/Articulo.php");
include_once("../Models/Calificacion.php");
include_once("../Models/Notificacion.php");

$numeroarticulo=$_REQUEST['numeroarticulo'];
$con=new Calificacion($numeroarticulo,"","","","");
$Registros=$con->consultarComentarios($numeroarticulo);
$Filas=pg_numrows($Registros);
for($cont=0;$cont<$Filas;$cont++){
	$vec=array( $comentarios=pg_result($Registros,$cont,0),
			   $sugerencias=pg_result($Registros,$cont,1),);
	$M[$cont]=$vec;
}
$vec=$M;
echo "<table border='1' bgcolor='white'>";
echo"<tr>"."<th>"."Comentarios"."</th>"."<th>"."Sugerencias"."</th>"."</tr>"."<tr>"."<td>".$vec[0][0]."</td>"."<td>".$vec[0][1]."</td>"."</tr>"."<tr>"."<td>".$vec[1][0]."</td>"."<td>".$vec[1][1]."</td>"."</tr>"."<tr>"."<td>".$vec[2][0]."</td>"."<td>".$vec[2][1]."</td>"."</tr>";
echo"</table>";
echo"<button>";
echo "<a href='../views/vistaNotificaciones.html' target='f1' class='btn'>";
echo "ATRAS";
echo "</a";
echo "</button>";
?>
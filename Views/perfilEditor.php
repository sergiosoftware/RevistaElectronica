<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="icon" href="../Imagenes/icon175x175.ico">
		<title>Revista Electónica UDC</title>
	</head>
	<body class="fondo-autor">		
		<section class="jumbotron">
			<div class="container">
				<h1 class="titulo-blog">Revista Electrónica jd&sc</h1>
				<p class="subtitulo-blog">Universidad de Caldas</p>
			</div>
		</section>
		<header>
			<nav class="navbar navbar-inverse navba-static-top Bienvenido-Usuario" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
							<span class="sr-only">Desplegar/Ocultar Menú</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                        <p class="navbar-brand Bienvenido-Usuario">BIENVENIDO <?php session_start();
                        $user=$_SESSION['usuario'];
                        echo $user; ?></p>
                        <p class="navbar-brand"><script type="text/javascript">
							var d=new Date();
							var m=d.getMonth()+1;
							document.write(' '+d.getDate(),'/ '+m,'/ '+d.getFullYear());	
							document.write(" "+d. getHours(),':'+d. getMinutes());
						</script></p>
					</div>
					<!--Inicio menu-->
					<div class="collapse navbar-collapse" id="navegacion-fm">
						<dd class="nav navbar-nav">
						    <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Asignar Artículo<span class="caret"></span></a>
								<dd class="dropdown-menu" role="menu">
									<li><a href="vistaAsignarPar.html" target="iframeSecciones">Asignar Par</a></li>
									<li class="divider"></li>
									<li><a href="vistaModificarAsignacion.html" target="iframeSecciones">Modificar Asignación</a></li>
									<li class="divider"></li>
									<li><a href="vistaEliminarAsignaciones.html" target="iframeSecciones">Eliminar Asignación</a></li>
								</dd>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Artículo<span class="caret"></span></a>
								<dd class="dropdown-menu" role="menu">
									<li><a href="vistaModificarArticulo.html" target="iframeSecciones">Modificar Artículo</a></li>
									<li class="divider"></li>
									<li><a href="vistaEliminarArticulos.html" target="iframeSecciones">Eliminar Artículo</a></li>
								</dd>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Autor<span class="caret"></span></a>
								<dd class="dropdown-menu" role="menu">
									<li><a href="vistaConsultaAutores.html" target="iframeSecciones">Consultar Autores</a></li>
									<li class="divider"></li>
									<li><a href="vistaRAutor1.html" target="iframeSecciones">Adicionar Autor(es)</a></li>
									<li class="divider"></li>
									<li><a href="vistaModificarAutor.html" target="iframeSecciones">Modificar Autor(es)</a></li>
									<li class="divider"></li>
									<li><a href="vistaEliminarAutores.html" target="iframeSecciones">Borrar Autor(es)</a></li>
								</dd>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Evaluador<span class="caret"></span></a>
								<dd class="dropdown-menu" role="menu">
									<li><a href="vistaConsultaEvaluadores.html" target="iframeSecciones">Consultar Evaluadores</a></li>
									<li class="divider"></li>
									<li><a href="vistaREvaluador1.html" target="iframeSecciones">Adicionar Evaluador(es)</a></li>
									<li class="divider"></li>
									<li><a href="vistaModificarEvaluador.html" target="iframeSecciones">Modificar Evaluador(es)</a></li>
									<li class="divider"></li>
									<li><a href="vistaEliminarEvaluadores.html" target="iframeSecciones">Borrar Evaluador(es)</a></li>
								</dd>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Calificados<span class="caret"></span></a>
								<dd class="dropdown-menu" role="menu">
									<li><a href="vistaCalificaciones.html" target="iframeSecciones">Notificar Autor</a></li>
									<li class="divider"></li>
									<li><a href="vistaPublicarArticulo.html" target="iframeSecciones">Publicar Artículo</a></li>		
								</dd>
							</li>
							<li><a href="vistaVerAsignaciones.html" target="f1" class="Notificacion-Usuario">Chat</a></li>
						</dd>
						<form action="" class="navbar-form navbar-right" role="search">
							<button type="button" class="btn btn-warning" name="CerrarsesionEditor" id="CerrarsesionEditor">Cerrar Sesión
								<span class="glyphicon glyphicon-log-out"></span>
							</button>
						</form>
					</div>
				</div>
			</nav>
		</header>
		<section class="main container">
			<div class="row">
				<section class="posts col-md-8">
				    <iframe src="../Imagenes/CCH_24005.gif" frameborder="0" name="iframeSecciones" width="100%" height="454px" class="iframe"></iframe>
				</section>
				<section class="col-md-1"></section>
				<section class="col-md-4">
				    <iframe name="f1" src="" width="100%" height="454px" class="iframe"></iframe>
				</section>
			</div>			
		</section>		
		<footer>
		</footer>
		<script src="../Jquery/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="../Boostrap/js/bootstrap.min.js"></script>
        <script src="../Jquery/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="../Js/jsEditor.js" type="text/javascript" language="javascript1.5"></script>
	</body>
	<link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Css/estilos.css">
	<script>
        $(document).ready(function(){
        $.backstretch([
        "../Imagenes/2.jpg",
        "../Imagenes/3.jpg",
        "../Imagenes/5.jpg",
        "../Imagenes/7.jpg",
        "../Imagenes/8.jpg",
        "../Imagenes/1.jpg",
        "../Imagenes/10.jpg"
        ],{
        fade:750,
        duration:3000
        });
        });
    </script>
</html>
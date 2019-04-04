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
							<li><a href="vistaVerAsignaciones.html" target="f1" class="Notificacion-Usuario">Chat</a></li>
						</dd>
						<form action="" class="navbar-form navbar-right" role="search">
							<button type="button" class="btn btn-warning" name="CerrarsesionEvaluador" id="CerrarsesionEvaluador">Cerrar Sesión
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
                  	<div class="col-xs-12 col-md-12 col-lg-12  body">
				<section class="posts col-md-12">                   
                  	<div class="col-xs-12 col-md-12 col-lg-12">
                         <br>
                  	    <div class="container col-xs-12 col-md-12 col-lg-12">
                  	        <button class="btn btn-info" name="ListarArticulos" id="ListarArticulos">Listar Articulos</button>
                  	        <br>
                  	        <br>
                  	        <div class="table-responsive">
                  	            <table id="Contenido" class="table table-striped table-bordered table-hover table-condensed col-md-12 col-lg-12 col-xs-12" >
                                <th class="success">ARTÍCULO</th>
                                <th class="success">TITULO</th>
                                <th class="success">TEMAS</th>
                                <th class="success">ARCHIVO</th>
                                <th class="success">ESTADO</th>
                                <th class="success">DESCARGAR <span class="glyphicon glyphicon-download-alt"></span></th>
                                <th class="success">ELEGIR</th>
                                </table>
                  	        </div>              	        
                        </div>
                        <form role="form" action="" method="post" class="form-horizontal">
                            <div class="container col-xs-12 col-md-12 col-lg-12">
                                <h2 class="subtitulos-blog" align="center">COMENTARIOS Y SUGERENCIAS ACERCA DEL ARTÍCULO</h2>
                                <div class="form-group">
                                    <div class="col-xs-9">
                                        <input type="hidden" class="form-control" name="NumeroArticulo" id="NumeroArticulo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Comentarios:</label>
                                    <div class="col-xs-9">
                                        <textarea class="form-control" name="texto" id="comentarios" placeholder="Comentarios..."></textarea>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Sugerencias:</label>
                                    <div class="col-xs-9">
                                        <textarea class="form-control" name="texto" id="sugerencias" placeholder="Sugerencias..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Calificación:</label>
                                    <div class="col-xs-9">
                                        <input type="number" class="form-control" name="calificacion" id="calificacion" min="1" max="5" placeholder="1 A 5, siendo 1 la peor calificación y 5 la mejor...">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <button type="reset" class="btn btn-danger" name="EnviarCalificacion" id="EnviarCalificacion">Enviar Calificación <span class="glyphicon glyphicon-edit"></span></button>
								    </div>
				                </div> 	                
                            </div>
                        </form>                        		    
					</div>					
				</section>
			</div>	
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
		<script type="text/javascript" src="../Boostrap/js/bootstrap.min.js">
        </script>
        <script src="../Jquery/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="../Js/jsEvaluador.js" type="text/javascript" language="javascript1.5"></script>
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
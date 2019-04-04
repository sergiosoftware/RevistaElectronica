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
						<form action="" class="navbar-form navbar-right" role="search">
							<button type="button" class="btn btn-warning" name="CerrarsesionAutor" id="CerrarsesionAutor">Cerrar Sesión
								<span class="glyphicon glyphicon-log-out"></span>
							</button>
						</form>
					</div>
				</div>
			</nav>
		</header>
		<section class="main container">
			<div class="row">
				<section class="posts col-md-7">              
                  	<div class="col-xs-12 col-md-12 col-lg-12  body">
                        <form action="../Models/Archivar.php"  method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="container col-xs-12 col-md-12 col-lg-12">
                                <h2 class="subtitulos-blog" align="center">CREAR Y REGISTAR ARTÍCULO</h2>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Título:</label>
                                    <div class="col-xs-9">
                                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título...">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Tema(s):</label>
                                    <div class="col-xs-9">
                                        <input  type="text" name="temas" id="temas" class="form-control" placeholder="Tema...">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Palabra(s) Clave(s):</label>
                                    <div class="col-xs-9">
                                        <input  type="text" name="palabrasClave" id="palabrasClave" class="form-control" placeholder="Palabra...">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Resumen:</label>
                                    <div class="col-xs-9">
                                        <textarea form-control name="texto" id="texto" class="form-control" placeholder="Resumen..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Cargar Archivo:</label>
                                    <div class="col-xs-9">
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <button class="btn btn-danger" name="enviarArchivo" id="enviarArchivo">Enviar artículo <span class="glyphicon glyphicon-edit"></span></button>
								    </div>
				                </div> 	                
                            </div>
                        </form>                    		    
					</div>					
				</section>
				<section class="col-md-1"></section>
				<section class="col-md-5">
				    <iframe name="f1" src="vistaNotificaciones.html" width="100%" height="416px" class="iframe"></iframe>
				</section>
			</div>			
		</section>		
		<footer>
		</footer>
		<script src="../Jquery/jquery-2.1.0.min.js" type="text/javascript" language="javascript1.5"></script>
		<script type="text/javascript" src="../Boostrap/js/bootstrap.min.js">
        </script>
        <script src="../Jquery/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="../Js/jsAutor.js" type="text/javascript" language="javascript1.5"></script>
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
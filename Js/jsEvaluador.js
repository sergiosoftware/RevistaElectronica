//Registrar Evaluador
$("#RegistrarEvaluador").button().on("click",function(event){
    usuario=$("#inputUsuario").val();
    contrasena=$("#inputPassword").val();
    ccontrasena=$("#CinputPassword").val();
    nombre=$("#inputNombre").val();
    apellidos=$("#inputApellidos").val();
    estudios=$("#inputEstudios").val();
    if(contrasena==ccontrasena){
        if(usuario!="" && contrasena!="" && nombre!=""){
            $.post("../Controller/controladora.php",{usuario:usuario,contrasena:contrasena,nombre:nombre,apellidos:apellidos,estudios:estudios,funcion:4},function(respuesta){
                alert("¡¡BIENVENIDO " + usuario + "!!");
                parent.window.location='index1.html';
            })            
        }else{
            alert("Debe ingresar campos obligatorios");
        }
    }else{
        alert("Contraseñas no coinciden");
    }
    
})
//Loggear Evaluador
$("#LoginEvaluador").button().on("click",function(event){
    usernameEvaluador=$("#InputUsernameEvaluador").val();
    passwordEvaluador=$("#InputPasswordEvaluador").val();
    if(usernameEvaluador!="" && passwordEvaluador!=""){
        $.post("../Controller/controladora.php",{usernameEvaluador:usernameEvaluador,passwordEvaluador:passwordEvaluador,funcion:5},function(respuesta){
            if(respuesta=='0'){
                alert("Usuario o contraseña invalido(o inexistente)");
            }else{
                alert("¡¡BIENVENIDO " + usernameEvaluador + "!!");
                parent.window.location='perfilEvaluador.php';
            }
        })
    }else{
        alert("Debe ingresar los campos obligatorios");
    }
})
//Cerrar Sesion Evaluador
$("#CerrarsesionEvaluador").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:6},function(respuesta){
        if(respuesta=='1'){
            parent.window.location='index1.html';
        }
    })
})
//Listar Articulos asignados
$("#ListarArticulos").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:12},function(respuesta){
        var datos= jQuery.parseJSON(respuesta); 	
        for (var i in datos){
            //alert("Cedula: "+datos[i].Cedula+" Nombre: "+datos[i].Nombre+" Apellido: "+datos[i].Apellido);
            var elementotr=document.createElement('tr');
			elementotr.setAttribute("class","tablaarticulos");
			// creacion primer td y se lo asigno al padre tr
			var elementotd=document.createElement('td');
			elementotd.setAttribute("class","tablaarticulos");
			elementotr.appendChild(elementotd); 
			var texto=document.createTextNode(datos[i].numeroarticulo);
			elementotd.appendChild(texto);
			elementotd.setAttribute("align","center");
			var elementotd=document.createElement('td');
			elementotd.setAttribute("class","tablaarticulos");
			elementotr.appendChild(elementotd); 
			var texto=document.createTextNode(datos[i].titulo);
			elementotd.appendChild(texto);
			elementotd.setAttribute("align","center");
			var elementotd=document.createElement('td');
			elementotd.setAttribute("class","tablaarticulos");
			elementotr.appendChild(elementotd); 
			var texto=document.createTextNode(datos[i].temas);
			elementotd.appendChild(texto);
			elementotd.setAttribute("align","center");
			var elementotd=document.createElement('td');
			elementotd.setAttribute("class","tablaarticulos");
			elementotr.appendChild(elementotd); 
			var texto=document.createTextNode(datos[i].nombre);
			elementotd.appendChild(texto);
			elementotd.setAttribute("align","center");
			var elementotd=document.createElement('td');
			elementotd.setAttribute("class","tablaarticulos");
			elementotr.appendChild(elementotd); 
			var texto=document.createTextNode(datos[i].estado);
			elementotd.appendChild(texto);
			elementotd.setAttribute("align","center");            
            var elementotd=document.createElement('td');
			elementotd.setAttribute("class","tablaarticulos");
			elementotr.appendChild(elementotd); 
			var elemtoa=document.createElement('a');
			elemtoa.setAttribute('href',"../Models/Descargar.php?"+'nombre='+datos[i].nombre);
			var createAText = document.createTextNode('Download');
			elemtoa.appendChild(createAText);
			elementotd.appendChild(elemtoa); 
			var elemento=document.createElement('input');
			elemento.setAttribute("type","radio");
			elemento.setAttribute("name","opcion");
			elemento.setAttribute("id","comprobar");
			elemento.setAttribute("onClick","$.valor()");
			elemento.setAttribute("value",datos[i].numeroarticulo);
			elementotr.appendChild(elemento);
            var obj=document.getElementById('Contenido');
			obj.appendChild(elementotr);
        }
        $.valor=function(){
            var valor=$("input[name='opcion']:checked").val();
            $("#NumeroArticulo").val(valor);
        }
    })
})
//Enviar calificacion del articulo al editor
$("#EnviarCalificacion").button().on("click",function(event){
    NumeroArticulo=$("#NumeroArticulo").val();
    Comentario=$("#comentarios").val();
    Sugerencia=$("#sugerencias").val();
    Calificacion=$("#calificacion").val();
    if(NumeroArticulo!="" && Calificacion!=""){
        $.post("../Controller/controladora.php",{NumeroArticulo:NumeroArticulo,Comentario:Comentario,Sugerencia:Sugerencia,Calificacion:Calificacion,funcion:13},function(respuesta){
            alert(respuesta);
        })        
    }else{
        alert("Debe elegir un articulo y dar su calificacion");
    }
})
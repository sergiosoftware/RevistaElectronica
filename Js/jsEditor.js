//Registrar Editor
$("#RegistrarEditor").button().on("click",function(event){
    usuario=$("#inputUsuario").val();
    contrasena=$("#inputPassword").val();
    ccontrasena=$("#CinputPassword").val();
    nombre=$("#inputNombre").val();
    apellidos=$("#inputApellidos").val();
    estudios=$("#inputEstudios").val();
    if(contrasena==ccontrasena){
        if(usuario!="" && contrasena!="" && nombre!=""){
            $.post("../Controller/controladora.php",{usuario:usuario,contrasena:contrasena,nombre:nombre,apellidos:apellidos,estudios:estudios,funcion:7},function(respuesta){
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
//Loggear Editor
$("#LoginEditor").button().on("click",function(event){
    usernameEditor=$("#InputUsernameEditor").val();
    passwordEditor=$("#InputPasswordEditor").val();
    if(usernameEditor!="" && passwordEditor!=""){
        $.post("../Controller/controladora.php",{usernameEditor:usernameEditor,passwordEditor:passwordEditor,funcion:8},function(respuesta){
            if(respuesta=='0'){
                alert("Usuario o contraseña invalido(o inexistente)");                
            }else{
                alert("¡¡BIENVENIDO " + usernameEditor + "!!");
                parent.window.location='perfilEditor.php';
            }
        })
        
    }else{
        alert("Debe ingresar los campos obligatorios");
    }
})
//Cerrar Sesion Editor
$("#CerrarsesionEditor").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:9},function(respuesta){
        if(respuesta=='1'){
            parent.window.location='index1.html';
        }
    })
})
//Consultar articulos registrados para asignar
$("#consultarArticulos").button().on("click",function(event){
    var numeroArticulo="";
    if($("#Parametro").val("todos")){
        numeroArticulo="";
    }
    $.post("../Controller/controladora.php",{numeroArticulo:numeroArticulo,funcion:14},function(respuesta){
        var datos=jQuery.parseJSON(respuesta);
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
				// creacion segundo td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].nomarchivo);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].estado);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
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
			$("#articuloSeleccionado").val(valor);
        }
    })
})
//Consultar evaluadores para asignar articulo
$("#consultarEvaluadores").button().on("click",function(event){
    var usuario="";
    if($("#Parametro1").val("todos")){
        usuario="";
    }
    $.post("../Controller/controladora.php",{usuario:usuario,funcion:15},function(respuesta){
        var datos=jQuery.parseJSON(respuesta);
        for (var i in datos){
				//alert("Cedula: "+datos[i].Cedula+" Nombre: "+datos[i].Nombre+" Apellido: "+datos[i].Apellido);
				var elementotr=document.createElement('tr');
				elementotr.setAttribute("class","tablaarticulos");
				// creacion primer td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].usuario);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].nombre);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				// creacion segundo td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].apellido);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd);
				var texto=document.createTextNode(datos[i].estudio);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotr.appendChild(elementotd);
				var elemtou=document.createElement('input');
				elemtou.setAttribute("type","radio");
				elemtou.setAttribute("onClick","$.valor2()");
				elemtou.setAttribute("name","asignar");
				elemtou.setAttribute("value",datos[i].usuario);
				elementotr.appendChild(elemtou);
				elementotd.setAttribute("align","center");
				/*var createAText = document.createTextNode('Asignar');
				elemtou.appendChild(createAText);*/
				var obj=document.getElementById('Contenido1');
				obj.appendChild(elementotr);
			}
        $.valor2=function(){
            var valor=$("input[name='asignar']:checked").val();
            $("#evaluadorAsignado").val(valor);
        }
    })
})
//Registrar Asignacion
$("#enviarAsignacion").button().on("click",function(event){
    articulo=$("#articuloSeleccionado").val();
    evaluador=$("#evaluadorAsignado").val();
    if(articulo!="" && evaluador!=""){
        $.post("../Controller/controladora.php",{articulo:articulo,evaluador:evaluador,funcion:16},function(respuesta){
            if(respuesta=='1'){                
                alert("Asignacion realizada");                
            }
        })        
    }else{
        alert("Debe seleccionar un articulo y un par evaluador");
    }    
})
//Listar Asignaciones
$("#verAsignaciones").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:17},function(respuesta){
        var datos=jQuery.parseJSON(respuesta);
        for (var i in datos){
				var elementotr=document.createElement('tr');
				elementotr.setAttribute("class","tablaarticulos");
				// creacion primer td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].numasignacion);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].numeroarticulo);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				// creacion segundo td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].usuario);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var obj=document.getElementById('Contenido1');
				obj.appendChild(elementotr);
			}        
    })
})
//Modificar Asignacion
$("#ModificarAsignacion").button().on("click",function(event){
    numeroAsignacion=$("#codigoNAsignacion").val();
    numeroArticulo=$("#codigoNArticulo").val();
    nuevoEvaluador=$("#EvaluadorNuevo").val();
    if(numeroAsignacion!="" && numeroArticulo!="" && nuevoEvaluador!=""){
        $.post("../controller/controladora.php",{numeroAsignacion:numeroAsignacion,numeroArticulo:numeroArticulo,nuevoEvaluador:nuevoEvaluador,funcion:18},function(respuesta){
            alert(respuesta);
        })        
    }else{
        alert("Debe ingresar campos obligatorios");
    }
})
//Eliminar Asignaciones
$("#eliminarAsignaciones").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:17},function(respuesta){
        var datos=jQuery.parseJSON(respuesta);
        for (var i in datos){
				var elementotr=document.createElement('tr');
				// creacion primer td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].numasignacion);
				elementotd.appendChild(texto);
				var elementotd=document.createElement('td');
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].numeroarticulo);
				elementotd.appendChild(texto);
				// creacion segundo td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].usuario);
				elementotd.appendChild(texto);
				// creacion tercer td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotr.appendChild(elementotd); 
				var elemtoa=document.createElement('a');				elemtoa.setAttribute('href',"../Models/Eliminar.php?"+'numasignacion='+datos[i].numasignacion);
				var createAText = document.createTextNode('Eliminar');
				elemtoa.appendChild(createAText);
				elementotd.appendChild(elemtoa);			 		
				var obj=document.getElementById('Contenido');
				obj.appendChild(elementotr);
			}
    })
})
$("#verArticulo").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:19},function(respuesta){
        var datos=jQuery.parseJSON(respuesta);
        for (var i in datos){
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
				// creacion segundo td y se lo asigno al padre tr
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].temas);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].palabrasclave);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var elementotd=document.createElement('td');
				elementotd.setAttribute("class","tablaarticulos");
				elementotr.appendChild(elementotd); 
				var texto=document.createTextNode(datos[i].usuario);
				elementotd.appendChild(texto);
				elementotd.setAttribute("align","center");
				var obj=document.getElementById('Contenido1');
				obj.appendChild(elementotr);
			}
    })
})
$("#ModificarArticulo").button().on("click",function(event){
    numeroArticulo=$("#articulo").val();
    titulo=$("#nuevoTi").val();
    temas=$("#nuevoTema").val();
    palabrasclave=$("#nuevaClave").val();
    if(numeroArticulo!="" && palabrasclave!=""){
        $.post("../controller/controladora.php",{numeroArticulo:numeroArticulo,titulo:titulo,temas:temas,palabrasclave:palabrasclave,funcion:20},function(respuesta){
            alert(respuesta);
        })
        
    }else{
        alert("Debe ingresar campos obligatorios");
    }
})

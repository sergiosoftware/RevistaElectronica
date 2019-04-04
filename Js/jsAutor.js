//Registrar Autor
$("#RegistrarAutor").button().on("click",function(event){
    usuario=$("#inputUsuario").val();
    contrasena=$("#inputPassword").val();
    ccontrasena=$("#CinputPassword").val();
    nombre=$("#inputNombre").val();
    apellidos=$("#inputApellidos").val();
    email=$("#inputEmail").val();
    direccion=$("#inputDireccion").val();
    telefono=$("#inputTelefono").val();
    ciudad=$("#inputCiudad").val();
    departamento=$("#inputDepartamento").val();
    institucion=$("#inputInstitucion").val();
    if(contrasena==ccontrasena){
        if(usuario!="" && contrasena!="" && nombre!="" && email!="" && departamento!="" && institucion!=""){
            $.post("../Controller/controladora.php",{usuario:usuario,contrasena:contrasena,nombre:nombre,apellidos:apellidos,direccion:direccion,telefono:telefono,ciudad:ciudad,departamento:departamento,institucion:institucion,email:email,funcion:1},function(respuesta){
                alert("¡¡BIENVENIDO " + usuario + "!!");
                parent.window.location='index1.html';
            })
        }else{
            alert("Debe ingresar campos obligatorios");
        }}else{
            alert("Contraseñas no coinciden");
        }
})
//Loggear Autor
$("#IngresarAutor").button().on("click",function(event){
    usernameAutor=$("#UsernameAutor").val();
    passwordAutor=$("#PasswordAutor").val();
    if(usernameAutor!="" && passwordAutor!=""){
        $.post("../Controller/controladora.php",{usernameAutor:usernameAutor,passwordAutor:passwordAutor,funcion:2},function(respuesta){
            if(respuesta=='0'){
                alert("Usuario o contraseña invalido(o inexistente)");
            }else{
                alert("¡¡BIENVENIDO " + usernameAutor + "!!");
                parent.window.location='perfilAutor.php';
            } 
        })        
    }else{
        alert("Debe ingresar los campos obligatorios");
    }
})
//Cerrar Sesion Autor
$("#CerrarsesionAutor").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:3},function(respuesta){
        if(respuesta=='1'){
            parent.window.location='index1.html';
        }
    })
})
//Registrar Archivo
$("#enviarArchivo").button().on("click",function(event){
    $.post("../Controller/controladora.php",{funcion:10},function(respuesta){
        alert(respuesta);        
    })
})
//Consultar notificaciones
$("#ConsultarNotificaciones").button().on("click",function(event){		
    $.post("../Controller/controladora.php",{funcion:11},function(respuesta){
        //alert(respuesta);
        var datos= jQuery.parseJSON(respuesta); 	
		for (var i in datos){
            var elementotr=document.createElement('tr');
            // creacion primer td y se lo asigno al padre tr
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd); 
            var texto=document.createTextNode(datos[i].numeroarticulo);
            elementotd.appendChild(texto);
            elementotd.setAttribute("align","center");
            // creacion segundo td y se lo asigno al padre tr
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd); 
            var texto=document.createTextNode(datos[i].decision);
            elementotd.appendChild(texto);
            elementotd.setAttribute("align","center");
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd); 
            var texto=document.createTextNode(datos[i].titulo);
            elementotd.appendChild(texto);
            elementotd.setAttribute("align","center");
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd); 
            var elemtoa=document.createElement('a');
            elemtoa.setAttribute('href',"../Models/Leer.php?"+'numeroarticulo='+datos[i].numeroarticulo);           
            var createAText = document.createTextNode('Ver Comentarios');
            elemtoa.appendChild(createAText);
            elementotd.appendChild(elemtoa);
            var obj=document.getElementById('Contenido');
            obj.appendChild(elementotr);
        }		
    })
})
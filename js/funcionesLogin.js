$(document).ready(function() {
   

       $("#botonAlta").click(function() {
			 var varMail=$("#correo").val();
			 var varClave=$("#clave").val();
			// var varEstado=$("#estado").val();
			
			  var datosLogin = {
			   	mail: varMail, 
			   	clave: varClave,
			   	//estado: varEstado 
			   }
              DatosRegistro = JSON.stringify(datosLogin);

    	

alert (datosLogin);
alert (DatosRegistro);
            $.get("http://localhost/TPProgramcion-laboratorioIII2017/usuario/traerUno",
            	{DatosRegistro}).done(  
            	function(retorno){
            		
               alter(retorno);
            
            
        })
            	.fail(function(retorno){
            		
                alert(retorno.responseText);
            
            
            
        });
        });
   });

//----------------------------------------
// function validarLogin()
// {
// 		 var varUsuario=$("#correo").val();
// 		 var varPassword=$("#clave").val();
	
// 		 var datosLogin = {
// 			    mail: varUsuario, 
// 		 	   	clave: varPassword			 
// 		 	   }

  

//     var cadena = JSON.stringify({clave: varPassword});

//     alert (cadena);

// 	var funcionAjax=$.ajax({
// 		url:"http://localhost/TPProgramcion-laboratorioIII2017/usuario/traerUno",
// 		type:"get",
// 		data:id:$("#clave").val(),		
// 		dataType: "xml/html/script/json",
//         contentType: "application/json"
		
// 	});

// //alert ("registrado");
// 	funcionAjax.done(function(retorno){
// 		alert (retorno);
		
// 			if(retorno !== null)
//             {
//             	var x= JSON.stringify({retorno});
//                 alert (x);
//             }
//             else
//             {
//                 alert ("Error");
//             }
// 	});
// 	funcionAjax.fail(function(retorno){
// 		alert ("Error");
// 		alert(retorno.responseText);
// 		// $("#botonesABM").html(":(");
// 		// $("#informe").html(retorno.responseText);	
// 	});
	
// }



//------------------------------------------------------------

// function deslogear()
// {	
// 	var funcionAjax=$.ajax({
// 		url:"php/deslogearUsuario.php",
// 		type:"post"		
// 	});
// 	funcionAjax.done(function(retorno){
// 			MostarBotones();
// 			MostarLogin();
// 			$("#usuario").val("Sin usuario.");
// 			$("#BotonLogin").html("Login<br>-Sesión-");
// 			$("#BotonLogin").removeClass("btn-danger");
// 			$("#BotonLogin").addClass("btn-primary");
			
// 	});	
// }
// function MostarBotones()
// {		//alert(queMostrar);
// 	var funcionAjax=$.ajax({
// 		url:"nexo.php",
// 		type:"post",
// 		data:{queHacer:"MostarBotones"}
// 	});
// 	funcionAjax.done(function(retorno){
// 		$("#botonesABM").html(retorno);
// 		//$("#informe").html("Correcto BOTONES!!!");	
// 	;


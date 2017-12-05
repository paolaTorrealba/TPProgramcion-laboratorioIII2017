
// function MostarLogin()
// {
// 	include("partes/formLogin.php");
	
// 	// var funcionAjax=$.ajax({
// 	// 	url:"http://localhost:8080/TPProgramacion-laboratorioIII2017/usuario/alta/",
// 	// 	type:"post",
// 	// 	data:{queHacer:"MostarLogin"}
// 	// });
// 	// funcionAjax.done(function(retorno){
// 	// 	$("#principal").html(retorno);
// 	// 	$("#informe").html("Correcto Form login!!!");	
// 	// });
// 	// funcionAjax.fail(function(retorno){
// 	// 	$("#botonesABM").html(":(");
// 	// 	$("#informe").html(retorno.responseText);	
// 	// });
// 	// funcionAjax.always(function(retorno){
// 	// 	//alert("siempre "+retorno.statusText);

// 	// });
// }



// $(document).ready(function() {   

//        $("#botonAlta").click(function() {
// 			 var varMail=$("#mail").val();
// 			 var varClave=$("#clave").val();
// 			 var varEstado=$("#estado").val();
			
// 			  var datosLogin = {
// 			   	mail: varMail, 
// 			   	clave: varClave,
// 			   	estado: varEstado 
// 			   }
//               DatosRegistro = JSON.stringify(datosLogin);

    	


//            alert (DatosRegistro);


//             $.post("http://localhost:8080/aplicacion/alta/",{DatosRegistro}, function(retorno){
//             if(retorno.codigo == 200)
//             {
//                 alert ("Usuario Cargado");
//             }
//             else
//             {
//                 alert ("Error");
//             }
            
//         });

// // function MostrarError()
// // {
// // 	var funcionAjax=$.ajax({
// // 		url:"nexoNoExiste.php",
// // 		type:"post",
// // 		data:{queHacer:"MostrarTexto"}});
// // 	funcionAjax.done(function(retorno){
// // 		$("#principal").html(retorno);
// // 		$("#informe").html("Correcto!!!");
// // 	});
// // 	funcionAjax.fail(function(retorno){
// // 			$("#principal").html("error :(");
// // 		$("#informe").html(retorno.responseText);		
// // 	});
// // 	funcionAjax.always(function(retorno){
// // 		//alert("siempre "+retorno.statusText);
// // 	});
// // }
// // function MostrarSinParametros()
// // {
// // 	var funcionAjax=$.ajax({url:"nexoTexto.php"});

// // 	funcionAjax.done(function(retorno){
// // 		$("#principal").html(retorno);
// // 		$("#informe").html("Correcto!!!");
// // 	});
// // 	funcionAjax.fail(function(retorno){
// // 		$("#principal").html(":(");
// // 		$("#informe").html(retorno.responseText);	
// // 	});
// // 	funcionAjax.always(function(retorno){
// // 		//alert("siempre "+retorno.statusText);

// // 	});
// // }

// // function Mostrar(queMostrar)
// // {
// // 		//alert(queMostrar);
// // 	var funcionAjax=$.ajax({
// // 		url:"nexo.php",
// // 		type:"post",
// // 		data:{queHacer:queMostrar}
// // 	});
// // 	funcionAjax.done(function(retorno){
// // 		$("#principal").html(retorno);
// // 		$("#informe").html("Correcto!!!");	
// // 	});
// // 	funcionAjax.fail(function(retorno){
// // 		$("#principal").html(":(");
// // 		$("#informe").html(retorno.responseText);	
// // 	});
// // 	funcionAjax.always(function(retorno){
// // 		//alert("siempre "+retorno.statusText);

// // 	});
// }

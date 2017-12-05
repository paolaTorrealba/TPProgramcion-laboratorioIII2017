<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'clases/AccesoDatos.php';
require_once 'clases/auto.php';
require_once 'clases/empleado.php';
require_once 'clases/alquilerCochera.php';
require_once 'clases/cochera.php';
require_once 'clases/usuario.php';

$app = new \Slim\App;

//------------------------AUTO----------------------------------
// //------------------------------------------------------------------
$app->get('/auto/traerTodos', function (Request $request, Response $response) {    
    
    $auto = auto::TraerTodos();  
    return $response->withJson($auto); 
});


$app->get('/auto/traerUno', function (Request $request, Response $response) { 

   // $id=$request->getAttribute('id');   
    $id = $request->getParam('id');  
    $auto = auto::TraerUno($id);
    return $response->withJson($auto);
});


$app->post('/auto/alta', function (Request $request, Response $response) {

    // $data = $request->getParsedBody();
    // $auto = [];
    // $auto['patente'] = filter_var($data['patente'], FILTER_SANITIZE_STRING);
    // $auto['color'] = filter_var($data['color'], FILTER_SANITIZE_STRING);
    // $auto['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING); 
      
    // $rta["rta"] = auto::Insertar($auto['patente'],$auto['color'],$auto['marca']);


   $patente = $request->getParam('patente');
   $color = $request ->getParam('color');
   $marca = $request->getParam('marca');
   $rta["rta"] = auto::Insertar($patente,$color,$marca);

    return $response->withJson($rta);         
});


// $app->delete('/auto/baja/{id}', function (Request $request, Response $response) {

//     $id=$request->getAttribute('id');
//     $auto = auto::Baja($id);  
//     return  $response->withJson($auto);   

// });


// $app->post('/auto/modificar', function (Request $request, Response $response) {
 
//      $data = $request->getParsedBody();
//      $auto = [];

//     $auto['patente'] = filter_var($data['patente'], FILTER_SANITIZE_STRING);
//     $auto['color'] = filter_var($data['color'], FILTER_SANITIZE_STRING);
//     $auto['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING); 
//     $auto['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
//     $modificado = auto::Modificar( $auto['id'] ,$auto['patente'],$auto['color'],$auto['marca']);
        
// });



// //------------------------COCHERA----------------------------------
// //------------------------------------------------------------------

$app->get('/cochera/traerTodos', function (Request $request, Response $response) {    
    
    $cochera = cochera::TraerTodos();  
    return $response->withJson($cochera); 
});


$app->get('/cochera/traerUno', function (Request $request, Response $response) { 

    //$id=$request->getAttribute('id');  
    $nroCochera = $request->getParam('nroCochera');  
    $cochera = cochera::TraerUno($nroCochera);
    return $response->withJson($cochera);
});


$app->post('/cochera/alta', function (Request $request, Response $response) {

    // $data = $request->getParsedBody();
    // $cochera = [];
    // $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    // $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
         
   // $rta["rta"] = cochera::Insertar($cochera['tipoCochera'],$cochera['estadoCochera']);

   $nroCochera = $request->getParam('nroCochera');
   $tipoCochera = $request ->getParam('tipoCochera');
   
   $rta["rta"] = cochera::Insertar($nroCochera,$tipoCochera);
    return $response->withJson($rta);         
});


// $app->delete('/cochera/baja/{id}', function (Request $request, Response $response) {

//     $id=$request->getAttribute('id');
//     $cochera = cochera::Baja($id);  
//     return  $response->withJson($cochera);   

// });


// $app->post('/cochera/modificar', function (Request $request, Response $response) {
 
//      $data = $request->getParsedBody();
//      $cochera = [];

//     $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
//     $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
//     $cochera['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
//     $modificado = cochera::Modificar( $cochera['id'] ,$cochera['tipoCochera'],$cochera['estadoCochera']);
        
// });

//------------------------ALQUILER-COCHERA----------------------------------
//------------------------------------------------------------------

$app->get('/alquilerCochera/traerTodos', function (Request $request, Response $response) {    
    
    $autoCochera = alquilerCochera::TraerTodos(); 
    return $response->withJson($autoCochera); 
});


$app->get('/alquilerCochera/traerUno', function (Request $request, Response $response) { 

    $patente = $request->getParam('patente');  
    $autoCochera = alquilerCochera::TraerUno($patente);
    return $response->withJson($autoCochera);
});


$app->post('/alquilerCochera/alta', function (Request $request, Response $response) {

    // $data = $request->getParsedBody();

    // $autoCochera = [];
    // $autoCochera['idAuto'] = filter_var($data['idAuto'], FILTER_SANITIZE_STRING);
    // $autoCochera['idCochera'] = filter_var($data['idCochera'], FILTER_SANITIZE_STRING);
    // $autoCochera['idEmpleado'] = filter_var($data['idEmpleado'], FILTER_SANITIZE_STRING);
    // $autoCochera['ingreso'] = filter_var($data['ingreso'], FILTER_SANITIZE_STRING);
    // $autoCochera['salida'] = filter_var($data['salida'], FILTER_SANITIZE_STRING);
    // $autoCochera['monto'] = filter_var($data['monto'], FILTER_SANITIZE_STRING);
     // $rta["rta"] = alquilerCochera::Insertar($autoCochera['idAuto'],$autoCochera['idCochera'],
     //                                    $autoCochera['idEmpleado'],$autoCochera['ingreso'],
     //                                    $autoCochera['salida'],$autoCochera['monto']);
   $patente = $request->getParam('patente');
   $cochera = $request ->getParam('idCochera');
   $empleado = $request->getParam('idEmpleado');
   $rta["rta"] = alquilerCochera::Insertar($patente,$cochera,$empleado);
   return $response->withJson($rta);         
});


// $app->delete('/alquilerCochera/baja', function (Request $request, Response $response) {

//     $id=$request->getAttribute('id');
//     $autoCochera = alquilerCochera::Baja($id);  
//     return  $response->withJson($autoCochera);   
// });


$app->post('/alquilerCochera/modificar', function (Request $request, Response $response) {
 
    $data = $request->getParsedBody();

   $patente = $request->getParam('patente');
   $cochera = $request ->getParam('cochera');
   $fechaIngreso = $request->getParam('fechaIngreso');
   $fechaSalida = $request->getParam('fechaSalida');
   $monto = $request->getParam('monto');
   
   $rta["rta"] = alquilerCochera::Actualizar( $patente,$cochera,$fechaIngreso,$fechaSalida,$monto);
   return $response->withJson($rta);
});




//------------------------EMPLEADO----------------------------------
//------------------------------------------------------------------

// $app->get('/empleado/traerTodos', function (Request $request, Response $response) {    
    
//     $empleado = empleado::TraerTodos();  
//     return $response->withJson($empleado); 
// });


// $app->get('/empleado/traerUno/{id}', function (Request $request, Response $response) { 

//     $id=$request->getAttribute('id');   
//     $empleado = empleado::TraerUno($id);
//     return $response->withJson($empleado);
// });


// $app->post('/empleado/alta', function (Request $request, Response $response) {

//     $data = $request->getParsedBody();
//     $empleado = [];
//     $empleado['tipoEmpleado'] = filter_var($data['tipoEmpleado'], FILTER_SANITIZE_STRING);
//     $empleado['estadoEmpleado'] = filter_var($data['estadoEmpleado'], FILTER_SANITIZE_STRING);
         
//     $rta["rta"] = cochera::Insertar($empleado['tipoEmpleado'],$empleado['estadoEmpleado']);
//     return $response->withJson($rta);         
// });


// $app->delete('/empleado/baja/{id}', function (Request $request, Response $response) {

//     $id=$request->getAttribute('id');
//     $empleado = empleado::Baja($id);  
//     return  $response->withJson($empleado);   
// });


// $app->post('/empleado/modificar', function (Request $request, Response $response) {
 
//     $data = $request->getParsedBody();
//     $empleado = [];

//     $empleado['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
//     $empleado['tipoEmpleado'] = filter_var($data['tipoEmpleado'], FILTER_SANITIZE_STRING);
//     $empleado['estadoEmpleado'] = filter_var($data['estadoEmpleado'], FILTER_SANITIZE_STRING);    
//     $modificado = cochera::Modificar($empleado['id'] ,$empleado['tipoEmpleado'],$empleado['estadoEmpleado']);
        
// });


// //------------------------USUARIO----------------------------------
// //------------------------------------------------------------------
$app->get('/usuario/traerTodos', function (Request $request, Response $response) {    

    $usuario = usuario::TraerTodos();  
    return $response->withJson($usuario); 
});


$app->get('/usuario/traerUno', function (Request $request, Response $response) { 
    $mail = $request->getParam('mail');
    $clave = $request->getParam('clave');
    $usuario = usuario::TraerUno($mail, $clave);    
    return $response->withJson($usuario);
   
});

$app->get('/usuario/verificar', function (Request $request, Response $response) { 


   $mail = $request ->getParam('mail');
   $clave = $request->getParam('clave');
   $nombre = $request->getParam('nombre');
   $perfil = $request->getParam('perfil');
     
    $usuario["rta"] = usuario::Verificar($nombre,$mail,$clave,$perfil);
    return "ok";
});


// $app->post('/usuario/alta', function (Request $request, Response $response) {
//   var_dump($request);
//     $data = $request->getParsedBody();
//     $usuario = [];

//     $usuario['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
//     $usuario['clave'] = filter_var($data['clave'], FILTER_SANITIZE_STRING);
//     $usuario['estado'] = filter_var($data['estado'], FILTER_SANITIZE_STRING); 
//     $usuario['rol'] = filter_var($data['rol'], FILTER_SANITIZE_STRING); 
      
//     $rta["rta"] = usuario::Insertar( $usuario['mail'],$usuario['clave'],$usuario['estado'],$usuario['rol']);
//     return $response->withJson($rta);         
// });


// $app->delete('/usuario/baja/{id}', function (Request $request, Response $response) {

//     $id=$request->getAttribute('id');
//     $usuario = usuario::Baja($id);  
//     return  $response->withJson($usuario);   

// });


// $app->post('/usuario/modificar', function (Request $request, Response $response) {
 
//     $data = $request->getParsedBody();
//     $usuario = [];

//     $usuario['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
//     $usuario['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
//     $usuario['clave'] = filter_var($data['clave'], FILTER_SANITIZE_STRING);
//     $usuario['estado'] = filter_var($data['estado'], FILTER_SANITIZE_STRING); 
//     $usuario['rol'] = filter_var($data['rol'], FILTER_SANITIZE_STRING); 
    
    
//     $modificado = usuario::Modificar( $usuario['id'] ,$usuario['mail'],$usuario['clave'],$usuario['estado'],$usuario['rol']);
        
// });
// // //------------File-----
// // $app->post('/archivo', function (Request $request, Response $response) {
 
// //     $files = $request->getUploadedFiles();
// //     $miArchivo= $files[];
   
// //         var_dump($miArchivo);
// //     return "pasame un archivo";
  
 
   
    
    
    
// // });


$app->run();
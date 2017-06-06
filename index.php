<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'clases/AccesoDatos.php';
require_once 'clases/auto.php';
require_once 'clases/empleado.php';
require_once 'clases/autoCochera.php';
require_once 'clases/cochera.php';
require_once 'clases/usuario.php';

$app = new \Slim\App;

//------------------------AUTO----------------------------------
//------------------------------------------------------------------
$app->get('/auto/traerTodos', function (Request $request, Response $response) {    
    
    $auto = auto::TraerTodos();  
    return $response->withJson($auto); 
});


$app->get('/auto/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $auto = auto::TraerUno($id);
    return $response->withJson($auto);
});


$app->post('/auto/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $auto = [];
    $auto['patente'] = filter_var($data['patente'], FILTER_SANITIZE_STRING);
    $auto['color'] = filter_var($data['color'], FILTER_SANITIZE_STRING);
    $auto['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING); 
      
    $rta["rta"] = auto::Insertar($auto['patente'],$auto['color'],$auto['marca']);
    return $response->withJson($rta);         
});


$app->delete('/auto/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $auto = auto::Baja($id);  
    return  $response->withJson($auto);   

});


$app->post('/auto/modificar', function (Request $request, Response $response) {
 
     $data = $request->getParsedBody();
     $auto = [];

    $auto['patente'] = filter_var($data['patente'], FILTER_SANITIZE_STRING);
    $auto['color'] = filter_var($data['color'], FILTER_SANITIZE_STRING);
    $auto['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING); 
    $auto['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
    $modificado = auto::Modificar( $auto['id'] ,$auto['patente'],$auto['color'],$auto['marca']);
        
});



//------------------------COCHERA----------------------------------
//------------------------------------------------------------------

$app->get('/cochera/traerTodos', function (Request $request, Response $response) {    
    
    $cochera = cochera::TraerTodos();  
    return $response->withJson($cochera); 
});


$app->get('/cochera/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $cochera = cochera::TraerUno($id);
    return $response->withJson($cochera);
});


$app->post('/cochera/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $cochera = [];
    $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
         
    $rta["rta"] = cochera::Insertar($cochera['tipoCochera'],$cochera['estadoCochera']);
    return $response->withJson($rta);         
});


$app->delete('/cochera/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $cochera = cochera::Baja($id);  
    return  $response->withJson($cochera);   

});


$app->post('/cochera/modificar', function (Request $request, Response $response) {
 
     $data = $request->getParsedBody();
     $cochera = [];

    $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
    $cochera['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
    $modificado = cochera::Modificar( $cochera['id'] ,$cochera['tipoCochera'],$cochera['estadoCochera']);
        
});

//------------------------AUTO-COCHERA----------------------------------
//------------------------------------------------------------------

$app->get('/autoCochera/traerTodos', function (Request $request, Response $response) {    
    
    $autoCochera = autoCochera::TraerTodos();  
    return $response->withJson($autoCochera); 
});


$app->get('/autoCochera/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $autoCochera = autoCochera::TraerUno($id);
    return $response->withJson($autoCochera);
});


$app->post('/autoCochera/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();

    $autoCochera = [];
    $autoCochera['idAuto'] = filter_var($data['idAuto'], FILTER_SANITIZE_STRING);
    $autoCochera['idCochera'] = filter_var($data['idCochera'], FILTER_SANITIZE_STRING);
    $autoCochera['idEmpleado'] = filter_var($data['idEmpleado'], FILTER_SANITIZE_STRING);
    $autoCochera['ingreso'] = filter_var($data['ingreso'], FILTER_SANITIZE_STRING);
    $autoCochera['salida'] = filter_var($data['salida'], FILTER_SANITIZE_STRING);
    $autoCochera['monto'] = filter_var($data['monto'], FILTER_SANITIZE_STRING);
             
    $rta["rta"] = autoCochera::Insertar($autoCochera['idAuto'],$autoCochera['idCochera'],
                                        $autoCochera['idEmpleado'],$autoCochera['ingreso'],
                                        $autoCochera['salida'],$autoCochera['monto']);
    return $response->withJson($rta);         
});


$app->delete('/autoCochera/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $autoCochera = autoCochera::Baja($id);  
    return  $response->withJson($autoCochera);   
});


$app->post('/autoCochera/modificar', function (Request $request, Response $response) {
 
    $data = $request->getParsedBody();

    $autoCochera = [];
    $autoCochera['idAuto'] = filter_var($data['idAuto'], FILTER_SANITIZE_STRING);
    $autoCochera['idCochera'] = filter_var($data['idCochera'], FILTER_SANITIZE_STRING);
    $autoCochera['idEmpleado'] = filter_var($data['idEmpleado'], FILTER_SANITIZE_STRING);
    $autoCochera['ingreso'] = filter_var($data['ingreso'], FILTER_SANITIZE_STRING);
    $autoCochera['salida'] = filter_var($data['salida'], FILTER_SANITIZE_STRING);
    $autoCochera['monto'] = filter_var($data['monto'], FILTER_SANITIZE_STRING);

    $modificado = autoCochera::Modificar($autoCochera['idAuto'],$autoCochera['idCochera'],
                                        $autoCochera['idEmpleado'],$autoCochera['ingreso'],
                                        $autoCochera['salida'],$autoCochera['monto']);
        
});




//------------------------EMPLEADO----------------------------------
//------------------------------------------------------------------

$app->get('/empleado/traerTodos', function (Request $request, Response $response) {    
    
    $empleado = empleado::TraerTodos();  
    return $response->withJson($empleado); 
});


$app->get('/empleado/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $empleado = empleado::TraerUno($id);
    return $response->withJson($empleado);
});


$app->post('/empleado/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $empleado = [];
    $empleado['tipoEmpleado'] = filter_var($data['tipoEmpleado'], FILTER_SANITIZE_STRING);
    $empleado['estadoEmpleado'] = filter_var($data['estadoEmpleado'], FILTER_SANITIZE_STRING);
         
    $rta["rta"] = cochera::Insertar($empleado['tipoEmpleado'],$empleado['estadoEmpleado']);
    return $response->withJson($rta);         
});


$app->delete('/empleado/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $empleado = empleado::Baja($id);  
    return  $response->withJson($empleado);   
});


$app->post('/empleado/modificar', function (Request $request, Response $response) {
 
    $data = $request->getParsedBody();
    $empleado = [];

    $empleado['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    $empleado['tipoEmpleado'] = filter_var($data['tipoEmpleado'], FILTER_SANITIZE_STRING);
    $empleado['estadoEmpleado'] = filter_var($data['estadoEmpleado'], FILTER_SANITIZE_STRING);    
    $modificado = cochera::Modificar($empleado['id'] ,$empleado['tipoEmpleado'],$empleado['estadoEmpleado']);
        
});


//------------------------USUARIO----------------------------------
//------------------------------------------------------------------
$app->get('/usuario/traerTodos', function (Request $request, Response $response) {    
    
    $usuario = usuario::TraerTodos();  
    return $response->withJson($usuario); 
});


$app->get('/usuario/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $usuario = usuario::TraerUno($id);
    return $response->withJson($usuario);
});


$app->post('/usuario/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $usuario = [];

    $usuario['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
    $usuario['clave'] = filter_var($data['clave'], FILTER_SANITIZE_STRING);
    $usuario['estado'] = filter_var($data['estado'], FILTER_SANITIZE_STRING); 
    $usuario['rol'] = filter_var($data['rol'], FILTER_SANITIZE_STRING); 
      
    $rta["rta"] = usuario::Insertar( $usuario['mail'],$usuario['clave'],$usuario['estado'],$usuario['rol']);
    return $response->withJson($rta);         
});


$app->delete('/usuario/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $usuario = usuario::Baja($id);  
    return  $response->withJson($usuario);   

});


$app->post('/usuario/modificar', function (Request $request, Response $response) {
 
    $data = $request->getParsedBody();
    $usuario = [];

    $usuario['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    $usuario['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
    $usuario['clave'] = filter_var($data['clave'], FILTER_SANITIZE_STRING);
    $usuario['estado'] = filter_var($data['estado'], FILTER_SANITIZE_STRING); 
    $usuario['rol'] = filter_var($data['rol'], FILTER_SANITIZE_STRING); 
    
    
    $modificado = usuario::Modificar( $usuario['id'] ,$usuario['mail'],$usuario['clave'],$usuario['estado'],$usuario['rol']);
        
});



$app->run();
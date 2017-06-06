<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'clases/AccesoDatos.php';
require_once 'clases/auto.php';

$app = new \Slim\App;

//------------------------AUTO----------------------------------
$app->get('/traerTodos', function (Request $request, Response $response) {    
    
    $auto = auto::TraerTodos();  
    return $response->withJson($auto); 
});


$app->get('/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $auto = auto::TraerUno($id);
    return $response->withJson($auto);
});


$app->post('/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $auto = [];
    $auto['patente'] = filter_var($data['patente'], FILTER_SANITIZE_STRING);
    $auto['color'] = filter_var($data['color'], FILTER_SANITIZE_STRING);
    $auto['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING); 
      
    $rta["rta"] = auto::Insertar($auto['patente'],$auto['color'],$auto['marca']);
    return $response->withJson($rta);         
});


$app->delete('/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $auto = auto::Baja($id);  
    return  $response->withJson($auto);   

});


$app->post('/modificar', function (Request $request, Response $response) {
 
     $data = $request->getParsedBody();
     $auto = [];

    $auto['patente'] = filter_var($data['patente'], FILTER_SANITIZE_STRING);
    $auto['color'] = filter_var($data['color'], FILTER_SANITIZE_STRING);
    $auto['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING); 
    $auto['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
    $modificado = auto::Modificar( $auto['id'] ,$auto['patente'],$auto['color'],$auto['marca']);
        
});



//------------------------COCHERA----------------------------------

$app->get('/traerTodos', function (Request $request, Response $response) {    
    
    $cochera = cochera::TraerTodos();  
    return $response->withJson($cochera); 
});


$app->get('/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $cochera = cochera::TraerUno($id);
    return $response->withJson($cochera);
});


$app->post('/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $cochera = [];
    $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
         
    $rta["rta"] = cochera::Insertar($cochera['tipoCochera'],$cochera['estadoCochera']);
    return $response->withJson($rta);         
});


$app->delete('/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $cochera = cochera::Baja($id);  
    return  $response->withJson($cochera);   

});


$app->post('/modificar', function (Request $request, Response $response) {
 
     $data = $request->getParsedBody();
     $cochera = [];

    $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
    $cochera['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
    $modificado = cochera::Modificar( $cochera['id'] ,$cochera['tipoCochera'],$cochera['estadoCochera']);
        
});



//------------------------EMPLEADO----------------------------------

$app->get('/traerTodos', function (Request $request, Response $response) {    
    
    $cochera = cochera::TraerTodos();  
    return $response->withJson($cochera); 
});


$app->get('/traerUno/{id}', function (Request $request, Response $response) { 

    $id=$request->getAttribute('id');   
    $cochera = cochera::TraerUno($id);
    return $response->withJson($cochera);
});


$app->post('/alta', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $cochera = [];
    $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
         
    $rta["rta"] = cochera::Insertar($cochera['tipoCochera'],$cochera['estadoCochera']);
    return $response->withJson($rta);         
});


$app->delete('/baja/{id}', function (Request $request, Response $response) {

    $id=$request->getAttribute('id');
    $cochera = cochera::Baja($id);  
    return  $response->withJson($cochera);   

});


$app->post('/modificar', function (Request $request, Response $response) {
 
     $data = $request->getParsedBody();
     $cochera = [];

    $cochera['tipoCochera'] = filter_var($data['tipoCochera'], FILTER_SANITIZE_STRING);
    $cochera['estadoCochera'] = filter_var($data['estadoCochera'], FILTER_SANITIZE_STRING);
    $cochera['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    
    $modificado = cochera::Modificar( $cochera['id'] ,$cochera['tipoCochera'],$cochera['estadoCochera']);
        
});


$app->run();
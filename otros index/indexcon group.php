<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'clases/AccesoDatos.php';
require_once 'clases/IApiUsable.php';
require_once 'clases/autoApi.php';
require_once 'clases/usuarioApi.php';
require_once 'clases/auto.php';
require_once 'clases/usuario.php';
//require_once 'clases/empleado.php';
//require_once 'clases/alquilerCochera.php';
//require_once 'clases/cochera.php';
//require_once 'clases/usuario.php';


// $config['displayErrorDetails'] = true;
// $config['addContentLengthHeader'] = false;

$app = new \Slim\App;



/*LLAMADA A METODOS DE INSTANCIA DE AUTO*/

$app->group('/auto', function () {   


 $this->get('/{id}', \autoApi::class . ':traerUno');
 $this->get('/', \autoApi::class.':traerTodos');
// $this->post('/', \cd::class . ':BorrarUno');
// $this->post('/', \cd::class . ':ModificarUno');
// $this->post('/', \cd::class . ':CargarUno');
});
$app->group('/usuario', function (){
$this->get('/{id}', \usuarioApi::class . ':traerUno');
 $this->get('/', \usuarioApi::class.':traerTodos');


});


$app->run();
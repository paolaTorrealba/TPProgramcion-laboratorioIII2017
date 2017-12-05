<?php
require_once 'auto.php';
require_once 'IApiUsable.php';

class autoApi extends auto implements IApiUsable
{
	public function TraerUno($request, $response) {
     	  $id = $request->getParam('id');  
          $elauto = auto::TraerUno($id);
          return $response->withJson($elauto, 200);
    }

 public function TraerTodos($request, $response, $args) {
          $todosLosAutos = auto::TraerTodos();  
          return $response->withJson($todosLosAutos, 200); 
    }
 public function CargarUno($request, $response) {
        $patente = $request->getParam('patente');
	    $color = $request ->getParam('color');
	    $marca = $request->getParam('marca');
	    $rta["rta"] = auto::Insertar($patente,$color,$marca);

	    return $response->withJson($rta);     
	}





  
  
});
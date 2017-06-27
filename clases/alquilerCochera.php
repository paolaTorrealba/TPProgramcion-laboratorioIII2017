<?php
class alquilerCochera
{
    public $patente;
    public $idCochera;
    public $idEmpleado;	
	public $fechaIngreso; 
 	public $fechaSalida;
 	public $monto;
  
  	
  	function __struct($patente,$idCochera,$idEmpleado, $fechaIngreso, $fechaSalida, $monto)
	{	

		$this-> $patente = $patente;
	    $this-> $idCochera = $idCochera;
	    $this-> $idEmpleado = $idEmpleado;
	    $this-> $fechaIngreso = $ingreso;	
	 	$this-> $fechaSalida = $salida;
	 	$this-> $monto = $monto;
	
	}
 
    //registro el ingreso de un auto a una cochera.
    public function Insertar($patente,$idCochera,$idEmpleado)
	 {
        $fechaIngreso = date("Y-m-d | h:i:sa");  
         $fechaSalida = null;   
        $monto = -1;
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into alquilerCochera 
			   	                                               ( patente, 
			   	                                                 idCochera, 
			   	                                                 idEmpleado,
			   	                                                 fechaIngreso,
			   	                                                 fechaSalida,
			   	                                                 monto   	                                                 
			   	                                                )
							                               values('$patente', 
							                                      '$idCochera', 
							                                      '$idEmpleado',
							                                      '$fechaIngreso',
							                                      '$fechaSalida',
							                                       monto);");
			return $consulta->execute();
	 }

 
   //obtengo el registro de ingreso del auto para calcular el monto a pagar y registrar esto junto con el horario de salida
   public static function TraerUno($patente) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select patente as patente,
			 												idCochera as idCochera,
			 												idEmpleado as idEmpleado,
			 												fechaIngreso as fechaIngreso,
			 												fechaSalida as fechaSalida,
			 												monto as monto
			 	                                            from alquilerCochera 
			 	                                            where patente = '$patente' and
			 	                                            monto = -1");
                                        
			$consulta->execute();
			$alquilerCocheraBuscado= $consulta->fetchObject('alquilerCochera');
			return $alquilerCocheraBuscado;				
		
	}


 //     //registro la salidad de un auto
	 public function Actualizar($patente,$idCochera,$fechaIngreso, $fechaSalida, $monto)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" update alquilerCochera 
															 set fechaSalida = '$fechaSalida',
														         monto = $monto     	
															 WHERE patente= '$patente' ");   
			$resultado = $consulta->execute();	          
			return $consulta;

	 }
	
     public static function traerTodos() 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select  id as id,
				                                             patente as patente,
				                                             idCochera as idCochera,
				                                             idEmpleado as idEmpleado,
				                                             fechaIngreso as fechaIngreso,
				                                             fechaSalida as fechaSalida,
				                                             monto as monto
															 from alquilercochera");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "alquilerCochera");		
	}

 //    //registro la salida de un auto de una cochera.  No se elimina el auto, solo se agrega el dato del monto y la hora de salida
	// public function Baja($idAuto,$idCochera, $fechaIngreso, $horaIngreso)
 //  	{      
 //  		    var $fechaIngreso = date("Y-m-d | h:i:sa");
	//   		// var $horaSalida = date("H:i:s");
	//   		// var $fechaSalida = date("Ymd");
	//         var $monto = -1;
	//  	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornaSrConsulta("update alquilerCochera
	// 												        set 
	// 												        fechaSalida = $fechaSalida,	
	// 												        monto = '$monto'		 
	// 												        WHERE 
	// 												        idAuto= $idAuto and
	// 		                                                idCochera = $idCochera and 
	// 		                                                fechaIngreso = $fechaIngreso");	
	// 		$consulta->execute();		
				
	// 		return $consulta->rowCount();
	//  }



	

   
  	
	// public function mostrarDatos()
	// {
	//   	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	// }

}
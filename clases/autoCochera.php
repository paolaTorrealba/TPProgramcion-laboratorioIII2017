<?php
class alquilerCochera
{
    public $idAuto;
    public $idCochera;
    public $idEmpleado;	
	public $fechaIngreso; 
 	public $fechaSalida;
 	public $monto;
  
  	
  	function __struct($idAuto,$idCochera,$idEmpleado, $fechaIngreso, $fechaSalida, $monto)
	{	

		$this-> $idAuto = $idAuto;
	    $this-> $idCochera = $idCochera;
	    $this-> $idEmpleado= $idEmpleado;
	    $this-> $fechaIngreso = $ingreso;	
	 	$this-> $fechaSalida = $salida;
	 	$this-> $monto= $monto;
	
	}
 
    //registro el ingreso de un auto a una cochera.
    public function Insertar($patente,$idCochera,$idEmpleado)
	 {
       var $fechaIngreso = date("Y-m-d | h:i:sa");  
       var $fechaSalida;   
       var $monto = -1;
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into alquilerCochera 
			   	                                               ( patente, 
			   	                                                 idCochera, 
			   	                                                 idEmpleado,
			   	                                                 fechaIngreso,
			   	                                                 fechaSalida,
			   	                                                 monto 
			   	                                                )
							                               values('$idAuto', 
							                                      '$idCochera', 
							                                      '$idEmpleado',
							                                      '$fechaIngreso',
							                                      '$fechaSalida',
							                                      '$monto'");
			$resultado = $consulta->execute();	

			return ;

	 }


    //obtengo el registro de ingreso del auto para calcular el monto a pagar y registrar esto junto con el horario de salida
   public static function TraerUno($idAuto) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select idAuto as idAuto,
															idCochera as idCochera,
															fechaIngreso as fechaIngreso,		
				                                            from alquilerCochera 
				                                            where fechaSalida = null and 
				                                            monto = -1");
			$consulta->execute();
			$alquilerCocheraBuscado= $consulta->fetchObject('alquilerCochera');
			return $alquilerCocheraBuscado;				
		
	}


     //registro la salidad de un auto
	 public function Actualizar($idAuto,$idCochera,$fechaIngreso, $fechaSalida, $monto)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" 
				update alquilerCochera 
				set idAuto = '$idAuto',
			        idCochera = '$idCochera',
			        fechaIngreso= '$fechaIngreso',
			        fechaSalida = '$fechaSalida', 
			        monto = '$monto'		
				WHERE idAuto= $idAuto and idCochera = $idCochera and fechaIngreso = $fechaIngreso");             
			return $consulta->execute();

	 }
	
    //registro la salida de un auto de una cochera.  No se elimina el auto, solo se agrega el dato del monto y la hora de salida
	public function Baja($idAuto,$idCochera, $fechaIngreso, $horaIngreso)
  	{      
  		    var $fechaIngreso = date("Y-m-d | h:i:sa");
	  		// var $horaSalida = date("H:i:s");
	  		// var $fechaSalida = date("Ymd");
	        var $monto = -1;
	 	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornaSrConsulta("update alquilerCochera
													        set 
													        fechaSalida = $fechaSalida,	
													        monto = '$monto'		 
													        WHERE 
													        idAuto= $idAuto and
			                                                idCochera = $idCochera and 
			                                                fechaIngreso = $fechaIngreso");	
			$consulta->execute();		
				
			return $consulta->rowCount();
	 }



	public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id,
															 tipoCochera as tipoCochera,
														     estadoCochera as estadoCochera from alquilerCochera");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "alquilerCochera");		
	}

   
  	
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}
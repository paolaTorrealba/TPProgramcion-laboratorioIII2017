<?php
class autoCochera
{
    public $idAuto;
    public $idCochera;
    public $idEmpleado;
	public $ingreso;
 	public $salida;
 	public $monto;
  
  	
  	function __struct($idAuto,$idCochera,$idEmpleado, $ingreso, $salida, $monto)
	{	

		$this-> $idAuto = $idAuto;
	    $this-> $idCochera = $idCochera;
	    $this-> $idEmpleado= $idEmpleado;
		$this-> $ingreso = $ingreso;
	 	$this-> $salida = $salida;
	 	$this-> $monto= $monto;
	
	}

    public function Insertar($idAuto,$idCochera,$idEmpleado, $ingreso, $salida, $monto)
	 {

       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into autoCochera 
	   	                                               (idAuto, idCochera, idEmpleado, ingreso, salida, monto)
						                               values('$idAuto', '$idCochera', 
						                               '$idEmpleado','$ingreso','$salida', '$monto");
			$resultado = $consulta->execute();	

			return $resultado;

	 }

	 public function Modificar($idAuto,$idCochera,$idEmpleado, $ingreso, $salida, $monto)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" 
				update autoCochera 
				set idAuto = '$idAuto',
			        idCochera = '$idCochera',
			        idEmpleado ='$idEmpleado', 
			        ingreso= '$ingreso',
			        salida = '$salida', 
			        monto = '$monto'		
				WHERE idAuto= $idAuto and idCochera = $idCochera and idEmpleado = $idEmpleado");             
			return $consulta->execute();

	 }
	

	public function Baja($idAuto,$idCochera,$idEmpleado, $ingreso, $salida, $monto)
  	{
  		 
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornaSrConsulta("delete from autoCochera WHERE idAuto= $idAuto and
			                                                idCochera = $idCochera and idEmpleado = $idEmpleado ");	
			$consulta->execute();		
				
			return $consulta->rowCount();
	 }
	public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, tipoCochera as tipoCochera, estadoCochera  as                                           estadoCochera from autoCochera");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "autoCochera");		
	}
   public static function TraerUno($idAuto,$idCochera,$idEmpleado, $ingreso, $salida, $monto) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, tipoCochera as tipoCochera, estadoCochera as estadoCochera  from autoCochera where id = $id");
			$consulta->execute();
			$cocheraBuscado= $consulta->fetchObject('autoCochera');
			return $cocheraBuscado;				

			
	}
  	
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}
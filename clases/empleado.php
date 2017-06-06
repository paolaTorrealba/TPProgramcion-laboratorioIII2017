<?php
class empleado
{
    public $id;
	public $legajo;
 	public $nombre;
    public $apellido;
    public $turno;
  
  	
  	function __struct($legajo,$nombre,$apellido,$turno)
	{	
		
		$this->legajo= $legajo;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->turno=$turno;
				
	}

    public function Insertar($legajo,$nombre,$apellido,$turno)
	 {

       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleado (legajo, nombre, apellido, turno)
						                                    values('$legajo', '$nombre','$apellido','$turno')");
			$resultado = $consulta->execute();	

			return $resultado;

	 }

	 public function Modificar($legajo,$nombre,$apellido,$turno)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" 
				update empleado 
				set legajo='$legajo',
				    nombre='$nombre',
				    apellido='$apellido',
				    turno='$turno'				
				WHERE id='$id'");             
			return $consulta->execute();

	 }
	

	public function Baja($id)
  	{
  		 
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from empleado WHERE id = $id");	
			$consulta->execute();		
				
			return $consulta->rowCount();
	 }
	public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, legajo as legajo, nombre as nombre, 
				                                              apellido as apellido, turno as turno from empleado");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");		
	}
   public static function TraerUno($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, legajo as legajo, nombre as nombre, 
				                                             apellido as apellido, turno as turno from empleado
				                                             where id = $id");
			$consulta->execute();
			$empleadoBuscado= $consulta->fetchObject('empleado');
			return $empleadoBuscado;				

			
	}
  	
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}